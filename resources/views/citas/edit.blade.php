@extends('layouts.panel')

@section('content')
    
<div class="card shadow">
         <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
            <h3 class="mb-0">Registrar Cita</h3>
            </div>
            <div class="col text-right">
            <a href="{{url('/citas')}}" class="btn btn-sm btn-success"><i class="fas fa-chevron-left"></i>Regresar</a>
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
        <form action="{{url('/citas/create')}}" method="POST">
         @csrf
				<div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="Id_cliente">Cliente</label>
                            <select name="Id_cliente" required value="{{old('Id_cliente')}}" class="form-control selectpicker" id="selcliente" title="Cliente"
                            data-style="btn-success" data-live-search="true" >
    
                            @foreach ($clientes as $cliente)
                                <option value={{$cliente->Id_cliente}}>{{$cliente->Nombre." ".$cliente->Apellidos." ".$cliente->Telefono." ".$cliente->Direccion}}</option>				 
                            @endforeach		
    
                            </select>	
                    </div>
                    </div>
    
                    {{-- com<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="Id_cliente">Cliente</label>
                            <input type="text" name="Id_cliente" required value="{{old('Id_cliente')}}" list="listaclientes" class="form-control" placeholder="Clientes">
                         
                         <datalist id="listaclientes" >
                            @foreach ($clientes as $cliente)
                                <option value={{$cliente->Id_cliente}}>{{$cliente->Nombre." ".$cliente->Apellidos." ".$cliente->Telefono." ".$cliente->Direccion}}</option>				 
                            @endforeach			
                        </datalist>
                    </div>
                    </div>ment --}}
    
                  {{-- Aparato --}}  
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="Id_aparato">Aparato</label>
                        <select name="Id_aparato" required value="{{old('Id_aparato')}}" class="form-control selectpicker" id="selaparato" title="Aparato"
                        data-style="btn-success" data-live-search="true">
                        @foreach ($aparatos as $aparato)
                            <option value='{{$aparato->Id_tipoaparato}}'>{{$aparato->tipoaparato->Nombre." ".$aparato->marca->Marca." ".$aparato->Modelo."  ".$aparato->Descripcion}}</option>				 
                        @endforeach			
                       </select>    
                    </div>
                </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Falla">Falla</label>
                <input type="text" name="Falla" required value="{{old('Falla')}}"  class="form-control" placeholder="Falla...">
             </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Fecha_creacion">Fecha de creacion</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control datepicker" placeholder="Seleccionar fecha" type="text" value="{{date('Y-m-d')}}" 
                    data-date-format="yyyy-mm-dd" data-date-start-date="-120d" data-date-end-date="+240d" >
                </div>
                {{--  <input type="date" name="Fecha_creacion" required value="{{old('Fecha_creacion')}}" class="form-control"> --}}
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
                <label for="Fecha_cita">Fecha de Cita</label>
                <input type="date" name="Fecha_cita" class="form-control" placeholder="">
            </div>
        </div>
        {{-- hora inicial --}}
        {{-- hora final --}}
   

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Hora_inicial">Hora Inicial</label>
                <input type="text" name="Hora_inicial" required value="{{old('Hora_inicial')}}"  class="form-control" placeholder="8:00 AM">
             </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Hora_final">Hora Final</label>
                <input type="text" name="Hora_final" required value="{{old('Hora_inicial')}}"  class="form-control" placeholder="6:00 PM">
             </div>
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Estado_cita">Estado de Cita</label>
                <select name="Estado_cita" class="form-control">
                <option value="Programada">Programada</option>
                <option value="Cancelada">Cancelada</option>
                <option value="Finalizada">Finalizada</option>
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Id_tecnico">Tecnico para cita</label>
                <select name="Id_tecnico" required value="{{old('Id_tecnico')}}" class="form-control selectpicker" title="Técnico.."
                data-style="btn-primary">
                    @foreach ($tecnicos as $tecnico)
                    <option value={{$tecnico->id}}>{{$tecnico->name." ".$tecnico->telefono." ".$tecnico->DNI}}</option>				 
                    @endforeach	
                </select>    
          </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Id_aparato">Usuario</label>
                <select name="Id_usuario" required value="{{old('Id_usuario')}}" class="form-control selectpicker" title="Usuario.."
                data-style="btn-primary">
                @foreach ($usuarios as $usuario)
                    <option value={{$usuario->id}}>{{$usuario->name." ".$usuario->telefono." ".$usuario->DNI}}</option>				 
                @endforeach		
            </select>	
            </div>
        </div>
        {{-- id de tecnico, usuario --}}

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Observaciones">Observaciones</label>
                <input type="text" name="Observaciones" required value="{{old('Observaciones')}}"  class="form-control" placeholder="Observaciones...">
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


 {{-- 
            aparatos 

            
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            {{ Form::label('Marca') }}
            {{ Form::select('Id_marca',$marcas,$aparato->Id_marca, ['class' => 'form-control' . ($errors->has('Id_marca') ? ' is-invalid' : ''),  'placeholder' => 'Marca...']) }}
            {!! $errors->first('Id_marca', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- comment        <datalist id="listamarcas" >
            @foreach ($marcas as $marc)
                <option value='{{$marc}}'>{{$marc}}</option>				 
            @endforeach			
        </datalist>
         --}}

      {{-- comment

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
            {{ Form::label('Modelo') }}
            {{ Form::text('Modelo', $aparato->Modelo, ['class' => 'form-control' . ($errors->has('Modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
            {!! $errors->first('Modelo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
            {{ Form::label('Descripcion') }}
            {{ Form::text('Descripcion', $aparato->Descripcion, ['class' => 'form-control' . ($errors->has('Descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    
      </div>
      --}}
    
</div>
@endsection
    
@section('scripts')

<script src="{{asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}} "></script>

<script>
    //esperamos que carg la funcion 
    $(document).ready(function(()=>{});
    $('#selcliente').selectpicker('val',@json($cliente->Id_cliente));
</script>
@endsection
