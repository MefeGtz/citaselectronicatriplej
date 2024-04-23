@extends('layouts.panel')

@section('content')
    
<div class="card shadow">
         <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
            <h3 class="mb-0">Tecnicos</h3>
            </div>
            <div class="col text-right">
            <a href="{{url('tecnicos/create')}}" class="btn btn-sm btn-primary">Registrar Tecnico</a>
             </div>
            </div>
        </div>
        <div class="card-body">
          @if(session('notification'))
          <div class="alert alert-success" role="alert">
             {{ session('notification') }}
        </div>
         @endif
        
         {{-- $table->string('DNI')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('rol');--}}
      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Correo</th>
              <th scope="col">DNI</th>
              <th scope="col">Dirección</th>
              <th scope="col">Telefono</th>
              <th scope="col">Opciones </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($valores as $valor)
            <tr>
              <th scope="row">
                {{$valor->id}}
              </th>
              <td>
                {{$valor->name}}
              </td>
              <td>
                {{$valor->email}}
              </td>
              <td>
                {{$valor->DNI}}
              </td>
              <td>
                {{$valor->direccion}}
              </td>
              <td>
               {{$valor->telefono}}
              </td>
              <td>
                <form action="{{url('/tecnicos/'.$valor->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a href="{{url('/tecnicos/'.$valor->id.'/edit')}}" class="btn btn-info"><i class="fas fa-pen"></i></a>
                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
        <div class="card-body">
          {{$valores->links()}}
        </div>
    
</div>
@endsection
