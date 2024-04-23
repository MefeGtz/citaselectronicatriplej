@extends('layouts.panel')

@section('template_title')
    {{ __('Update') }} Tipoaparato
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Tipo de aparato</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tipoaparato.update', $tipoaparato->Id_tipoaparato) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tipoaparato.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
