<?php

namespace App\Http\Controllers;
use App\Models\cliente;
use App\Models\Citas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
//use DB;

class GraficasController extends Controller
{
    //
    public function index()
    {   

     //   $hoy= Carbon:: today('America/Tegucigalpa');
       //$clientes= cliente::all()->Count();
       $cantclientes=DB::table('clientes')->Count();
       //calcularemos la cantidad de citas para hoy y las separaremos por roles de modo que el tecnico pueda ver lascitas para el hoy
       //y el administradaor todas

       $hoy= Carbon:: today('America/Tegucigalpa');

       if( auth()->user()->rol=='TecAdmin'){

        $citashoy=DB::table('citas')->where('Fecha_cita','=',$hoy)
        ->where('Estado_cita','=','Programada')
        ->Count();

        //citas completadas
        $citas_completadas=DB::table('citas')->where('Fecha_cita','=',$hoy)
        ->where('Estado_cita','=','Finalizada')
        ->Count();

        $proximos=Carbon::today()->addDays(10);
          $areparar=DB::table('citas')->whereBetween('Fecha_cita',[$hoy,$proximos])
         ->where('Estado_cita','=','Programada')
            ->Count();

       }else {
        $citashoy=DB::table('citas')->where('Fecha_cita','=',$hoy)
        ->where('Estado_cita','=','Programada')
        ->where('Id_tecnico','=',auth()->id())
        ->Count();
        //citas completadas
        $citas_completadas=DB::table('citas')->where('Fecha_cita','=',$hoy)
        ->where('Estado_cita','=','Finalizada')
        ->where('Id_tecnico','=',auth()->id())
        ->Count();

        $proximos=Carbon::today()->addDays(10);
          $areparar=DB::table('citas')->whereBetween('Fecha_cita',[$hoy,$proximos])
         ->where('Estado_cita','=','Programada')
         ->where('Id_tecnico','=',auth()->id())
        ->Count();
       }

       //esta consulta sera para el grafico de citas finalizadas y canceladas por mes y se agregara la condicion de autenticacion
       if( auth()->user()->rol=='TecAdmin'){
        $citascanceladas= Citas::select(
            DB::raw("MONTH(Fecha_cita) as mes"),
            DB::raw("COUNT(1) as total"))
            ->where('Estado_cita','Cancelada')
            ->groupBy('mes')
            ->get()
            ->toArray();

            $citasfinalizadas= Citas::select(
                DB::raw("MONTH(Fecha_cita) as mes"),
                DB::raw("COUNT(1) as total"))
                ->where('Estado_cita','Finalizada')
                ->groupBy('mes')
                ->get()
                ->toArray();
        
        $conteocitasc= array_fill(0,12,0);
        foreach ($citascanceladas as $citacancelada){
            $index=$citacancelada['mes']-1;
            $conteocitasc[$index]=$citacancelada['total'];
        }

        $conteocitasf= array_fill(0,12,0);
        foreach ($citasfinalizadas as $citaf){
            $index=$citaf['mes']-1;
            $conteocitasf[$index]=$citaf['total'];
        }
        //dd($conteocitasf);
       }else {
        $citascanceladas= Citas::select(
            DB::raw("MONTH(Fecha_cita) as mes"),
            DB::raw("COUNT(1) as total"))
            ->where('Estado_cita','Cancelada')
            ->where('Id_tecnico','=',auth()->id())
            ->groupBy('mes')
            ->get()
            ->toArray();

            $citasfinalizadas= Citas::select(
                DB::raw("MONTH(Fecha_cita) as mes"),
                DB::raw("COUNT(1) as total"))
                ->where('Estado_cita','Finalizada')
                ->where('Id_tecnico','=',auth()->id())
                ->groupBy('mes')
                ->get()
                ->toArray();
        
        $conteocitasc= array_fill(0,12,0);
        foreach ($citascanceladas as $citacancelada){
            $index=$citacancelada['mes']-1;
            $conteocitasc[$index]=$citacancelada['total'];
        }

        $conteocitasf= array_fill(0,12,0);
        foreach ($citasfinalizadas as $citaf){
            $index=$citaf['mes']-1;
            $conteocitasf[$index]=$citaf['total'];
        }
        //dd($conteocitasf);




       }

        return view('graficas.index',compact('cantclientes','citashoy','citas_completadas','conteocitasc','conteocitasf','areparar'));

    }

    public function desempenotecJson(){
        $tecnicos= User::Todos()
       ->select('name')
       ->withCount(['citasCompletadas','citasCanceladas'])
       ->orderBy('citas_completadas_count','desc')
       //tomamos los primero 7 
       ->take(5)
       ->get();
  //->toArray();
       //dd($tecnicos);
       //las lineas anteriores eran para pruebas procecdemos a agregar un arreglo sin formato
       $data=[];
       $data['categories']=$tecnicos->pluck('name');
       $series=[];
       $series1['name']='Citas Completadas';
       $series1['data']=$tecnicos->pluck('citas_completadas_count');
       $series2['name']='Citas Canceladas';
       $series2['data']=$tecnicos->pluck('citas_canceladas_count');
       $series[]=$series1;
       $series[]=$series2;
       $data['series']=$series;
       return $data;

    }


}
