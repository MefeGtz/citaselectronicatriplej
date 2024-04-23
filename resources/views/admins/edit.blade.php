<?php
use Illuminate\Support\Str;
?>

@extends('layouts.panel')
@section('content')
<div class="card shadow">
         <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
            <h3 class="mb-0"> Editar Usuario</h3>
            </div>
            <div class="col text-right">
            <a href="{{url('/admins')}}" class="btn btn-sm btn-success"><i class="fas fa-chevron-left"></i>Regresar</a>
             </div>
            </div>
        </div>
      <div class="card-body">
		@if($errors->any())
			@foreach ($errors->all() as $error)
				<div class="alert alert-danger" role="alert">
					<i class="fas fa-exclamation-triangle"></i>
					<strong>Error!</strong>{{$error}}
				</div>
			@endforeach
		@endif
        <form action="{{url('/admins/'.$usuario->id)}}" method="POST">
         @csrf
         @method('PUT') 
            <div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="nombre">Nombre de Usuario </label>
            			<input type="text" name="name" required value="{{old('name', $usuario->name)}}"  class="form-control" placeholder="Nombre...">
                	 </div>
				</div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="nombre">Correo de Técnico </label>
            			<input type="text" name="email" required value="{{old('email',$usuario->email)}}"  class="form-control" placeholder="Correo Electrónico...">
                	 </div>
				</div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="nombre">DNI</label>
            			<input type="number" name="DNI" class="form-control" required value="{{old('DNI',$usuario->DNI)}}"   placeholder="DNI">
                	 </div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="direccion">Dirección</label>
            			<input type="text" name="direccion" required value="{{old('direccion',$usuario->direccion)}}"  class="form-control" placeholder="Dirección...">
                	 </div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="telefono">Teléfono</label>
            			<input type="number" name="telefono" required value="{{old('telefono',$usuario->telefono)}}"  class="form-control" placeholder="Teléfono...">
                	 </div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="password">Contraseña</label>
            			<input type="text" name="password"  class="form-control" placeholder="Contraseña...">
                        <small class="text-warning">Solo llene el campo si desea cambiar la Contraseña</small>

                	 </div>
				</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<button class="btn btn-primary" type="submit">Guardar</button>
            		<button class="btn btn-danger" type="reset">Cancelar</button>
            	</div>
			</div>
		</div>
        </form>
      </div>
    
</div>
@endsection
