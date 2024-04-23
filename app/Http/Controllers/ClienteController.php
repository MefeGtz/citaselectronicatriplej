<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\Clientess;
use Illuminate\Support\Facades\DB;


class ClienteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
       // $this->middleware('log')->only('index');
       // $this->middleware('subscribed')->except('store');
    }
  
    public function index(){
        $clientes= cliente::all()->sortByDesc('Id_cliente');
        //compact('clientes')
        $cantclientes=DB::table('clientes')->Count();
            return view('clientes.index',compact('clientes','cantclientes'));
    }

    public function create(){
        return view('clientes.create');
    }
    //reqest toma la infromacion que hay en el formulaio
    //primero va el campo en la tabla y luego entre comilllas lo que captura del formulario
    public function sendData(Request $request){
        //reglas  de validacion:
        //validacion 
        //lo que este en el form
        $rules=[
            'nombre'=>'required|min:2',
            'apellidos' => 'required|min:1',
            'genero' => 'required|min:1',
            'telefono' =>'required|min:4',
            
        ];
        $messages=[
            'nombre.required'=>'El nombre es requerido',
            'nombre.min'=>'El nombre debe tener al menos dos letras',
            'apellidos.required'=>'Los apellidos son requeridos',
            'apellidos.min'=>'los apellidos deben tener al menos una letra',
            'genero.required'=>'Seleccione un genero',
            'telefono.required'=>'el telefono es obligatorio',
            'telefono.min'=>'el telefono debe ser minimo de cuatro numeros'
        ];
       // ];

        $this->validate($request,$rules, $messages);

        $client= new cliente();
        $client->Nombre=$request->input('nombre');
        $client->Apellidos=$request->input('apellidos');
        $client->Genero=$request->input('genero');
        $client->Direccion=$request->input('direccion');
        $client->Telefono=$request->input('telefono');
        $client->save();
        $notification= 'El cliente se ha creado correcamente';
        return redirect('/clientes')->with(Compact('notification'));
    }

    //recibe los parametros para editar los registros.

    public function edit(cliente $cliente ){
        
        //$datos=cliente::findOrFail($cliente);
        //return $datos;

        return view('clientes/edit',compact('cliente'));
    }

    public function update(Request $request, cliente $cliente){
        //reglas  de validacion:
        //validacion 
        //lo que este en el form
        $rules=[
            'nombre'=>'required|min:2',
            'apellidos' => 'required|min:1',
            'genero' => 'required|min:1',
            'telefono' =>'required|min:4',
            
        ];
        $messages=[
            'nombre.required'=>'El nombre es requerido',
            'nombre.min'=>'El nombre debe tener al menos dos letras',
            'apellidos.required'=>'Los apellidos son requeridos',
            'apellidos.min'=>'los apellidos deben tener al menos una letra',
            'genero.required'=>'Seleccione un genero',
            'telefono.required'=>'el telefono es obligatorio',
            'telefono.min'=>'el telefono debe ser minimo de cuatro numeros'
        ];
       // ];

        $this->validate($request,$rules, $messages);

        //$client= new cliente();
        $cliente->Nombre=$request->input('nombre');
        $cliente->Apellidos=$request->input('apellidos');
        $cliente->Genero=$request->input('genero');
        $cliente->Direccion=$request->input('direccion');
        $cliente->Telefono=$request->input('telefono');
        $cliente->save();
        $notification='El cliente: '.$cliente->Nombre.' se ha actualizado correctamente!';
        return redirect('/clientes')->with(Compact('notification'));
    }

    //destroy
    public function destroy (cliente $cliente) {
        $dato=$cliente->Nombre.
        $cliente->delete();
        $notification='El cliente: '.$dato.' se ha eliminado correctamente!';
    return redirect('/clientes')->with(Compact('notification'));
    }
}
