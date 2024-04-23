@extends('layouts.panel')

@section('template_title')
    {{ $aparato->name ?? "{{ __('Show') Aparato" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Aparato</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('aparato.index') }}"> {{ __('regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Aparato:</strong>
                            {{ $aparato->Id_aparato }}
                        </div>
                        <div class="form-group">
                            <strong>Id Tipoaparato:</strong>
                            {{ $aparato->Id_tipoaparato }}
                        </div>
                        <div class="form-group">
                            <strong>Id Marca:</strong>
                            {{ $aparato->Id_marca }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $aparato->Modelo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $aparato->Descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
