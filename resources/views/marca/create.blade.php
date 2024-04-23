@extends('layouts.panel')

@section('template_title')
    {{ __('Registrar') }} Marca
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Marca</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('marca.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('marca.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
