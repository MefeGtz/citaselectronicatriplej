@extends('layouts.panel')

@section('template_title')
    {{ $tipoaparato->name ?? "{{ __('mostrar') Tipoaparato" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Tipoaparato</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipoaparato.index') }}"> {{ __('Atras') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Id Tipoaparato:</strong>
                            {{ $tipoaparato->Id_tipoaparato }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tipoaparato->Nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
