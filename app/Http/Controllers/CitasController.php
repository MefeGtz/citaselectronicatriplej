<?php

namespace App\Http\Controllers;
use App\Models\cliente;
use App\Models\Aparato;
use App\Models\User;
use App\Models\Citas;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
//validator
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class CitasController extends Controller
{
    //
    //$cliente_aparato=DB::table('cliente_aparato')->where('nombre_apellido','LIKE','%'.$query.'%')
    //->orwhere('aparato','LIKE','%'.$query.'%')
    //>orwhere('marca','LIKE','%'.$query.'%')
    //->orderBy('idclienteaparato','desc')->get();

    public function index(){
        
        //para que solo los admins puedan ver todas las citas
       if( auth()->user()->rol=='TecAdmin'){
        //citas programadas para el admin
        $citasprog=Citas::all()
        ->where('Estado_cita','Programada')->sortDesc();

        //para canceladas
        $citascanc=Citas::all()
        ->where('Estado_cita','Cancelada')->sortDesc();
        //para finalizadas
        $citasfinal=Citas::all()
        ->where('Estado_cita','Finalizada')->sortDesc();
       }else{
        //citas programmdas para el tecnico que hay iniciado sesion
        $citasprog=Citas::all()
        ->where('Estado_cita','Programada')
        ->where('Id_tecnico',auth()->id())
        ->sortDesc();

        //para canceladas
        $citascanc=Citas::all()
        ->where('Estado_cita','Cancelada')
        ->where('Id_tecnico',auth()->id())->sortDesc();
        //para finalizadas
        $citasfinal=Citas::all()
        ->where('Estado_cita','Finalizada')
        ->where('Id_tecnico',auth()->id())->sortDesc();
       }

        $citas = Citas::all()->sortDesc();    
        return view('citas.index',compact('citas','citasprog','citascanc','citasfinal'));
    }   


    public function create(){  
        //dd($request->all());
        $clientes= cliente::all()->sortByDesc('Id_cliente');
        $aparatos= Aparato::all()->sortByDesc('Id_aparato');
        $usuarios= User::all();
        $tecnicos= User::all();//DB::table('users')->where('rol','=');

        return view('citas.create',compact('clientes','aparatos','usuarios','tecnicos'));
    }

    public function store(Request $request){

        $rules=[
            'Id_cliente'=> 'required',
            'Id_aparato'=> 'required',
            'Falla'=> 'required',
            'Fecha_creacion'=> 'required',
            'Fecha_cita'=> 'required',
            'Hora_inicial'=> 'required',
            'Hora_final'=> 'required',
            'Estado_cita'=> 'required',
            'Id_tecnico'=> 'required',
            'Id_usuario'=>'required',
        ];

        $messages = [
            'Id_cliente.required'=>'Cliente no valido',
            'Id_aparato.required'=>'El aparato no es valido',
            'Falla.required'=>'Ingrese la falla del aparato',
            'Fecha_creacion.required'=>'Fecha de creacion de cita obligatoria',
            'Fecha_cita.required'=>'Fecha de cita es requerida',
            'Hora_inicial.required'=>'La hora de inicio es requerida',
            'Hora_final.required'=>'La hora final es requerida',
            'Estado_cita.required'=>'Seleccione el estado de la cita',
            'Id_tecnico.required'=>'Tecnico no valido',
            'Id_usuario.required'=>'Usuario no valido',
            ];

        $validator=Validator::make($request->all(),$rules,$messages);

        //para la conversion de horas de formato de 12 a 
        $validator->after(function ($validator) use ($request){
            $datahi=$request->input('Hora_inicial');
            $carbonhinicial= Carbon::createFromFormat('g:i A',$datahi);
            $datahf=$request->input('Hora_final');
            $carbonhfinal= Carbon::createFromFormat('g:i A',$datahf);

        if ($carbonhinicial>$carbonhfinal) {
            $validator->errors()->add(
           'Hora_inicial', 'la Hora inicial no puede ser mayor a la hora final'
        );
        }

        //para las fechas 
        $fechacita = Carbon::parse($request->input('Fecha_cita'));
        $fechacreacion=Carbon::parse($request->input('Fecha_creacion'));

        if ($fechacreacion>$fechacita) {
            $validator->errors()->add(
           'Fecha_creacion', 'La fecha de creacion de cita no puede ser mayor a la fecha de cita'
        );
        }


                });

                if ($validator->fails()) {
                    return back()
                                ->withErrors($validator)
                                ->withInput();
                }

        $data= $request->only([
            'Id_cliente',
            'Id_aparato',
            'Falla',
            'Fecha_creacion',
            'Fecha_cita',
            'Hora_inicial',
            'Hora_final',
            'Estado_cita',
            'Id_tecnico',
            'Id_usuario',
            'Observaciones',
        ]);

        //para la conversion de horas de formato de 12 a 24
        $carbonhinicial= Carbon::createFromFormat('g:i A',$data['Hora_inicial']);
        $data['Hora_inicial']= $carbonhinicial->format('H:i:s');
        $carbonhfinal= Carbon::createFromFormat('g:i A',$data['Hora_final']);
        $data['Hora_final']= $carbonhfinal->format('H:i:s');


        if($carbonhinicial<$carbonhfinal){
            Citas::create($data);
           $notification= 'La cita se ha creado correctamente';
        }else{
            $notification='Horas no validas';
        }
        
       //aun falta la otra vista
        // return redirect('/Citas')->with(compact('notification'));
        return back()->with(compact('notification'));
    
    }


    public function edit($id){  

        //$cita=Cita::findorfail($i)
        $clientes= cliente::all();
        $aparatos= Aparato::all();
        $usuarios= User::all();
        $tecnicos= User::all();//DB::table('users')->where('rol','=');

        return view('citas.create',compact('clientes','aparatos','usuarios','tecnicos'));
    }


    ///para la seccion de reportes:
    
    //para mostrar los reportes de las citas
    public function reportescitas(){
        
        //para que solo los admins puedan ver todas las citas
       if( auth()->user()->rol=='TecAdmin'){
        //citas programadas para el admin
        $citasprog=Citas::all()
        ->where('Estado_cita','Programada')->sortDesc();

        //para canceladas
        $citascanc=Citas::all()
        ->where('Estado_cita','Cancelada')->sortDesc();
        //para finalizadas
        $citasfinal=Citas::all()
        ->where('Estado_cita','Finalizada')->sortDesc();

        $citas = Citas::all()->sortDesc();  

       }else{
        //citas programmdas para el tecnico que hay iniciado sesion
        $citasprog=Citas::all()
        ->where('Estado_cita','Programada')
        ->where('Id_tecnico',auth()->id())
        ->sortDesc();

        //para canceladas
        $citascanc=Citas::all()
        ->where('Estado_cita','Cancelada')
        ->where('Id_tecnico',auth()->id())->sortDesc();
        //para finalizadas
        $citasfinal=Citas::all()
        ->where('Estado_cita','Finalizada')
        ->where('Id_tecnico',auth()->id())->sortDesc();

        $citas=Citas::all()
        ->where('Id_tecnico',auth()->id())->sortDesc();
       }

         
        return view('reportes.reportecitas',compact('citas'));
    }   


    public function desemtecnico(){
        
        //para que solo los admins puedan ver todas las citas
       //if( auth()->user()->rol=='TecAdmin'){
        //$citas = Citas::all()->->orderBy('name', 'desc')sortDesc();  

        $citas = Citas::all()->sortByDesc('Id_tecnico')->sortByDesc('Fecha_cita');
        //sortBy('price')

       //}else{
        //citas programmdas para el tecnico que hay iniciado sesion
       //}

         
        return view('reportes.desemtecnicos',compact('citas'));
    }   
    

    ///para cancelar la cita 

    public function cancel(Request $request, Citas $citas){
        
       // $cita=Citas::findOrFail($citas);
        $citas->Estado_cita='Cancelada';
        $citas->Observaciones=$request->get('observaciones');
        $citas->save();
       //$cita->save();  
       //$cita=$citas->Id_aparato;
        $notification='Cita '.$citas->Id_cita.' Cancelada';
        
       //aun falta la otra vista
        // return redirect('/Citas')->with(compact('notification'));
        return back()->with(compact('notification'));
    }

    //para el estado finalizado
    public function final(Request $request, Citas $citas){
        
        // $cita=Citas::findOrFail($citas);
         $citas->Estado_cita='Finalizada';
         $citas->Observaciones=$request->get('observaciones');
         $Horafinal=$request->get('Hora_final');
         $carbonhfinal= Carbon::createFromFormat('g:i A',$Horafinal);
         $Horafinal= $carbonhfinal->format('H:i:s');
         $citas->Hora_final=$Horafinal;
         $citas->save();
        //$cita->save();  
        //$cita=$citas->Id_aparato;
         $notification='Cita '.$citas->Id_cita.' Finalizada';
         
        //aun falta la otra vista
         // return redirect('/Citas')->with(compact('notification'));
         return back()->with(compact('notification'));
     }




}
