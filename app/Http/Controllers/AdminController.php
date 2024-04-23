<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $valores=User::Admins()->paginate(15);
        return view('admins.index',compact('valores'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules=[
            'name'=>'required|min:2',
            'email' => 'required|email',
            'DNI'=> 'required',
            'direccion'=> 'required',
            'telefono'=> 'required|min:4',
        ];
        $messages=[
            'name.required'=>'El nombre es requerido',
            'name.min'=>'El nombre debe tener al menos dos letras',
            'email.required'=>'El correo es obligatorio',
            'email.email'=>'Ingrese una direccion de correo valida',
            'DNI.required'=>'Ingrese un DNI',
            'direccion.required'=>'La direccion es requerida',
            'telefono.required'=>'El telefono es obligatorio',
            'telefono.min'=>'el telefono debe ser minimo de cuatro numeros',
        ];
       // ];

        $this->validate($request,$rules, $messages);

        //haremos un arreglo asociativo y luego otro

        User::create(
            $request->only('name','email','DNI','direccion','telefono')+
            [
                'rol'=>'TecAdmin',
                'password'=>bcrypt($request->input('password')),
            ]
        );
        $notification= 'El Usuario se ha registrado correcamente';
        return redirect('/admins')->with(Compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $usuario=User::Admins()->findOrFail($id);
        return view ('admins.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $rules=[
            'name'=>'required|min:2',
            'email' => 'required|email',
            'DNI'=> 'required',
            'direccion'=> 'required',
            'telefono'=> 'required|min:4',
        ];
        $messages=[
            'name.required'=>'El nombre es requerido',
            'name.min'=>'El nombre debe tener al menos dos letras',
            'email.required'=>'El correo es obligatorio',
            'email.email'=>'Ingrese una direccion de correo valida',
            'DNI.required'=>'Ingrese un DNI',
            'direccion.required'=>'La direccion es requerida',
            'telefono.required'=>'El telefono es obligatorio',
            'telefono.min'=>'el telefono debe ser minimo de cuatro numeros',
        ];
       // ];

        $this->validate($request,$rules, $messages);

        $user=User::Admins()->findOrFail($id);
        //haremos un arreglo asociativo y luego otro

        $data= $request->only('name','email','DNI','direccion','telefono');
        $password=  $request->input('password');

       if ($password) {
           $data['password'] = bcrypt($password);
        }
        $user->fill($data)->save();

        $notification= 'La información del Usuario se ha actuaizado correcamente';
        return redirect('/admins')->with(Compact('notification'));
    }

    public function destroy(string $id)
    {
        //
        $user=User::Admins()->findOrFail($id);
        $n=$user->name;
        $user->delete();
        $notification='El Usuario: '.$n.' se ha eliminado correctamente!';
        return redirect('/admins')->with(Compact('notification'));
    }

}
