@extends('layouts.panel')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
    
<div class="card shadow">
         <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
            <h3 class="mb-0">Registrar Cita</h3>
            </div>
            <div class="col text-right">
            <a href="{{url('/vercitas')}}" class="btn btn-sm btn-success"><i class="fas fa-chevron-left"></i>Regresar</a>
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

        @if(session('notification'))
        <div class="alert alert-success" role="alert">
           {{ session('notification') }}
      </div>
       @endif
        <div>
          
        </div>

    <form action="{{url('/registrarcita')}}" method="POST">
         @csrf
            <div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="Id_cliente">Cliente</label>
            			<select name="Id_cliente" required value="{{old('Id_cliente')}}" class="form-control selectpicker" title="Cliente"
                        data-style="btn-success" data-live-search="true" >

                        @foreach ($clientes as $cliente)
                            <option value={{$cliente->Id_cliente}}
                                @if(old('Id_cliente')==$cliente->Id_cliente) selected @endif>
                                {{$cliente->Nombre." ".$cliente->Apellidos." ".$cliente->Telefono." ".$cliente->Direccion}}</option>				 
                        @endforeach		

                        </select>	
                </div>
				</div>

              {{-- Aparato --}}  
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="Id_aparato">Aparato</label>
                    <select name="Id_aparato" required value="{{old('Id_aparato')}}" class="form-control selectpicker" title="Aparato"
                    data-style="btn-success" data-live-search="true">
                    @foreach ($aparatos as $aparato)
                        <option value='{{$aparato->Id_aparato}}'
                            @if(old('Id_aparato')==$aparato->Id_aparato) selected @endif>
                            {{$aparato->tipoaparato->Nombre." ".$aparato->marca->Marca." ".$aparato->Modelo."  ".$aparato->Descripcion}}</option>				 
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
                    <input name="Fecha_creacion" class="form-control" placeholder="Seleccionar fecha" type= "date" 
                     value="{{ old('Fecha_creacion')}}" 
                    data-date-format="yyyy-mm-dd">
                </div>
                {{--  <input type="date" name="Fecha_creacion" required value="{{old('Fecha_creacion')}}" class="form-control"> --}}
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
                <label for="Fecha_cita">Fecha de Cita</label>
                <input type="date" name="Fecha_cita" class="form-control"  value="{{old('Fecha_cita'),date('Y-m-d')}}" placeholder="">
            </div>
        </div>
        {{-- hora inicial --}}
        {{-- hora final 
   
        {{
            $horasT=['8:00 AM','9:00 AM','10:00 AM','11:00 AM', '12:00 PM','1:00 PM','2:00 PM','3:00 PM', '4:00 PM', '5:00 PM','6:00 PM'];
        }}
        --}}
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Hora_inicial">Hora Inicial</label>
                <select name="Hora_inicial" required   class="form-control" id="horai" placeholder="8:00 AM">
                 @for($i=8; $i<=11; $i++)
                   <option value="{{$i.':'.'00:'.' AM'}}"
                   @if(old('Hora_inicial')==($i.':'.'00:'.' AM')) selected @endif>
                   {{$i}}:00 AM </option>
                   
                 @endfor
                 <option value="{{'12'.':'.'00:'.' PM'}}"
                 @if(old('Hora_inicial')==('12'.':'.'00:'.' PM')) selected @endif>12:00 PM </option>
                 @for($i=1; $i<=5; $i++)
                 <option value="{{$i.':'.'00:'.' PM'}}"
                 @if(old('Hora_inicial')==($i.':'.'00:'.' PM')) selected @endif
                 >{{$i}}:00 PM </option>
                 @endfor

                </select>
             </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Hora_final">Hora Final</label>
                <select type="text" name="Hora_final" required class="form-control"  id="Horaf" placeholder="6:00 PM">
                    @for($i=9; $i<=11; $i++)
                        <option value="{{$i.':'.'00:'.' AM'}}"
                        @if(old('Hora_final')==($i.':'.'00:'.' AM')) selected @endif>{{$i}}:00 AM </option>
                    @endfor
                        <option value="{{'12'.':'.'00:'.' PM'}}"
                        @if(old('Hora_final')==('12'.':'.'00:'.' PM')) selected @endif>12:00 PM </option>
                  @for($i=1; $i<=6; $i++)
                         <option value="{{$i.':'.'00:'.' PM'}}"
                         @if(old('Hora_final')==($i.':'.'00:'.' PM')) selected @endif>{{$i}}:00 PM </option>
                  @endfor   
                </select>
             </div>
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Estado_cita">Estado de Cita</label>
                <select name="Estado_cita" class="form-control" selected= {{old('Estado_cita')}}>
                    
                    <option value="Programada" >Programada</option>
                    <option value="Cancelada">Cancelada</option>
                    <option value="Finalizada">Finalizada</option>
                    <option value={{old('Estado_cita')}} selected> {{old('Estado_cita')}} </option>
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Id_tecnico">Tecnico para cita</label>
                <select name="Id_tecnico" required value="{{old('Id_tecnico')}}" class="form-control selectpicker" title="Técnico.."
                data-style="btn-primary">
                    @foreach ($tecnicos as $tecnico)
                    <option value={{$tecnico->id}}
                        @if(old('Id_tecnico')==$tecnico->id) selected @endif>
                        {{$tecnico->name." ".$tecnico->telefono." ".$tecnico->DNI}}</option>				 
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
                    <option value={{$usuario->id}}
                        @if(old('Id_usuario')==$usuario->id) selected @endif>
                        {{$usuario->name." ".$usuario->telefono." ".$usuario->DNI}}</option>				 
                @endforeach		
            </select>	
            </div>
        </div>
        
        {{-- id de tecnico, usuario --}}

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Observaciones">Observaciones</label>
                <input type="text" name="Observaciones" value="{{old('Observaciones')}}"  class="form-control" placeholder="Observaciones...">
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
    
@section('scripts')

<script src="{{asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}} "></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
    //document.getElementById("producto").value
    
    //inicio.addEventListener("change", comparaHoras);
    //final.addEventListener("change", comparaHoras);
        const inicio = document.getElementById("horai").value;
    const final = document.getElementById("horaf").value;
   
    //ShowSelected();
    alert(inicio);
    var select = document.getElementById('horai');
    select.addEventListener('change',
        function(){
    var selectedOption = this.options[select.selectedIndex];
    alert(selectedOption.value + ': ' + selectedOption.text);
  });

</script>

@endsection
