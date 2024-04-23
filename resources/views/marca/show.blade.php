@extends('layouts.panel')

@section('template_title')
    {{ $marca->name ?? "{{ __('mostrar') Marca" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Marca</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('marca.index') }}"> {{ __('Atras') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Marca:</strong>
                            {{ $marca->Id_marca }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $marca->Marca }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
