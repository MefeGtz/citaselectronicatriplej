@extends('layouts.panel')


@section ('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css"> 


{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css"> --}}

@endsection


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Marca') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('marca.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Registrar Marca') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table  id="tabla" class="table table-striped table-bordered table-condensed table-hover table-flush " style="width:100%" >
                                <thead class="thead">
                                    <tr>
                                    
										<th>Id Marca</th>
										<th>Marca</th>

                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($marcas as $marca)
                                        <tr>
											<td>{{ $marca->Id_marca }}</td>
											<td>{{ $marca->Marca }}</td>

                                            <td>
                                                <form action="{{ route('marca.destroy',$marca->Id_marca) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('marca.show',$marca->Id_marca) }}"> <i class="fa fa-fw fa-eye"> </i> {{ __('') }}</a> --}}
                                                    
                                                    <a class="btn btn-sm btn-success" href="{{ route('marca.edit',$marca->Id_marca) }}"> <i class="fa fa-fw fa-edit"> </i> {{ __('') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{--  {!! $marcas->links() !!}--}}
               
            </div>
        </div>
    </div>
@endsection


@section ('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>


<script src="https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-MX.json"></script>

<script>
    
new DataTable('#tabla', {
    order: [[ 0, 'desc' ]],
    responsive: true,
    rowReorder: true,
    autoWidth: false,
        language: {
          "decimal": ".",
    "emptyTable": "No hay datos disponibles en la tabla",
    "zeroRecords": "No se encontraron coincidencias",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
    "infoFiltered": "(Filtrado de _MAX_ total de entradas)",
    "lengthMenu": "Mostrar _MENU_ entradas",
            "search": "Buscar:",   
            "infoEmpty": "No hay datos para mostrar",
        "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": ">",
        "previous": "<"
        }
  }
    
});
</script>
@endsection



