@extends('layouts.panel')
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('template_title')
    {{ __('Registrar') }} Aparato
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="col text-right">
                            <a href="{{url('/aparato')}}" class="btn btn-sm btn-success"><i class="fas fa-chevron-left"></i>Regresar</a>
                             </div>
                        <span class="card-title">{{ __('Registrar') }} Aparato</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('aparato.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('aparato.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
