@extends('layouts.panel')

@section ('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css"> 


{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css"> --}}

@endsection

@section('content')
    
<div class="card shadow">
         <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
            <h3 class="mb-0">Clientes</h3>
            </div>
            <div class="col text-right">
            <a href="{{url('clientes/create')}}" class="btn btn-sm btn-primary" ><i class='fas fa-plus' style='font-size:28px;color:white'></i></a>
             </div>
            </div>
        </div>
        <div class="card-body">
          @if(session('notification'))
          <div class="alert alert-success" role="alert">
             {{ session('notification') }}
        </div>
         @endif
       
       {{--  @include('clientes.search') --}} 
      <div class="table-responsive">
        <!-- Projects table -->
        <table  id="tabla" class="table table-striped table-bordered table-condensed table-hover table-flush " style="width:100%" >
          <thead class="thead-light">
            <tr>
              <th scope="col">Idcliente</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Genero</th>
              <th scope="col">Dirección</th>
              <th scope="col">Telefono</th>
              <th scope="col">Opciones </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($clientes as $cliente)
            <tr>
              <th scope="row">
                {{$cliente->Id_cliente}}
              </th>
              <td>
                {{$cliente->Nombre}}
              </td>
              <td>
                {{$cliente->Apellidos}}
              </td>
              <td>
                {{$cliente->Genero}}
              </td>
              <td>
                {{$cliente->Direccion}}
              </td>
              <td>
               {{$cliente->Telefono}}
              </td>
              <td>
                <form action="{{url('/clientes/'.$cliente->Id_cliente)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a href="{{url('/clientes/'.$cliente->Id_cliente.'/edit')}}" class="btn btn-info"><i class="fas fa-pen"></i></a>
                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
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