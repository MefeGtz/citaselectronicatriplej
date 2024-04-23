@extends('layouts.panel')
@section('content')    
<div class="card shadow">
         <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
            <h3 class="mb-0"> Editar Cliente</h3>
            </div>
            <div class="col text-right">
            <a href="{{url('/clientes')}}" class="btn btn-sm btn-success"><i class="fas fa-chevron-left"></i>Regresar</a>
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
        <!--este form hace una peticion de tipo put -->
        <form action="{{url('/clientes/'.$cliente->Id_cliente)}}" method="POST">
         @csrf
         @method('PUT')
            <div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="nombre">Nombre de cliente </label>
            			<input type="text" name="nombre" required value="{{old('nombre',$cliente->Nombre)}}"  class="form-control" placeholder="Nombre">
                	 </div>
				</div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="nombre">Apellido de cliente </label>
            			<input type="text" name="apellidos" required value="{{old('apellidos',$cliente->Apellidos)}}"  class="form-control" placeholder="Apellido">
                	 </div>
				</div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="nombre">Genero</label>
            			<select type="text" name="genero" class="form-control" value="{{old('genero',$cliente->Genero)}}" > 
							<option value="{{$cliente->Genero}}" selected >{{$cliente->Genero}}</option>	
							<option value="Masculino">Masculino</option>
							<option value="Femenino">Femenino</option>
						</select>
                	 </div>

				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="direccion">Dirección</label>
            			<input type="text" name="direccion" required value="{{old('direccion',$cliente->Direccion)}}"  class="form-control" placeholder="Dirección...">
                	 </div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="telefono">Teléfono</label>
            			<input type="number" name="telefono" required value="{{old('telefono',$cliente->Telefono)}}"  class="form-control" placeholder="Teléfono...">
                	 </div>
				</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<button class="btn btn-primary" type="submit">Guardar Cliente</button>
            		<button class="btn btn-danger" type="reset">Cancelar</button>
            	</div>
			</div>
		</div>
        </form>
      </div>
    
</div>
@endsection
