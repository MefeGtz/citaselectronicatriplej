<div class="box box-info padding-1">
    <div class="row">
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                {{ Form::label('Aparato') }}
                {{ Form::select('Id_tipoaparato',$tipoaparatos,$aparato->Id_tipoaparato, ['class' => 'form-control selectpicker' . ($errors->has('Id_tipoaparato') ? ' is-invalid' : ''),'data-style'=>'btn-success', 'data-live-search'=>'true','placeholder' => 'Tipo de aparato']) }}
                {{-- {{{!! Form::text($name, $value, [$options]) !!}}} 
             <datalist id="listaaparatos">
                @foreach($tipoaparatos as $tipo)
                <option value="{{$tipo}}">{{$tipo}}</option>
                @endforeach
            </datalist>  --}}

            {!! $errors->first('Id_tipoaparato', '<div class="invalid-feedback">:message</div>') !!}
            </div>
         </div>

        {{-- comment 
             'list'=>'listaaparatos',
       
            <div class="form-group">
                <label for="aparato">Aparato</label>
                <input type="text" name="aparato" required value="{{old('aparato')}}" list="listaaparatos"  class="form-control" placeholder="Seleccione o ingrese el tipo de aparato ">
                
             </div>
						<div class="form-group">
						<label for="marca">Marca</label>
						<input type="text" name="marca" required value="{{old('marca')}}" class="form-control" placeholder="Marca...">	
				</div>

                'list' => 'listamarcas' ,
        --}}


      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            {{ Form::label('Marca') }}
            {{ Form::select('Id_marca',$marcas,$aparato->Id_marca, ['class' => 'form-control selectpicker' . ($errors->has('Id_marca') ? ' is-invalid' : ''), 'data-style'=>'btn-success', 'data-live-search'=>'true' ,'placeholder' => 'Marca...']) }}
            {!! $errors->first('Id_marca', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- comment        <datalist id="listamarcas" >
            @foreach ($marcas as $marc)
                <option value='{{$marc}}'>{{$marc}}</option>				 
            @endforeach			
        </datalist>
         --}}

      </div>


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
        <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        </div>


</div>

@section('scripts')

<script src="{{asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}} "></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection