@extends('layouts.panel')

@section ('styles')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css"> --}}

@endsection
@section('content')
    
<div class="card shadow">
         <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
            <h3 class="mb-0">Reportes Citas</h3>
            </div>
            <div class="col text-right">
            <a href="{{url('citas/create')}}" class="btn btn-sm btn-primary" ><i class='fas fa-plus' style='font-size:28px;color:white'></i></a>
             </div>
            </div>
        </div>
        <div class="card-body">
          @if(session('notification'))
          <div class="alert alert-success" role="alert">
             {{ session('notification') }}
        </div>
         @endif
        <div>
        </div>

        <div class="table-responsive">
          <!-- Projects table class="table align-items-center table-flush" -->
          <table  id="citas" class="table table-striped table-bordered table-condensed table-hover dt-responsive" style="width:100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">Id Cita</th>
                <th scope="col">Cliente </th>
                <th scope="col">Teléfono</th>
                <th scope="col">Dirección</th>
                <th scope="col">Aparato </th>
                <th scope="col">Marca </th>
                <th scope="col">Modelo </th>
                <th scope="col">Falla </th>
                <th scope="col">Fecha Cita </th>
                <th scope="col">Hora Inicial </th>
                <th scope="col">Hora Final </th>
                <th scope="col">Estado </th>
                <th scope="col">Técnico</th>
                <th scope="col">Teléfono Técnico</th>
                <th scope="col">Observaciones</th>
                <th scope="col">Opciones </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($citas as $cita)
              <tr>
                <th scope="row">
                  {{$cita->Id_cita}}
                </th>
                <td>
                  {{$cita->cliente->Nombre.' '.$cita->cliente->Apellidos}}
                </td>
                <td>
                  {{$cita->cliente->Telefono}}
                </td>
                <td>
                  {{$cita->cliente->Direccion}}
                </td>
                <td>
                  {{$cita->aparato->tipoaparato->Nombre }}
                </td>
                <td>
                  {{$cita->aparato->marca->Marca}}
                </td>
                <td>
                  {{$cita->aparato->Modelo}}
                </td>
                <td>
                  {{$cita->Falla}}
                </td>
                <td>
                  {{$cita->Fecha_cita}}
                </td>
                <td>
                  {{$cita->Hora_Inicial_12}}
                </td>
                <td>
                  {{$cita->Hora_Final_12}}
                </td>
                <td>
                  {{$cita->Estado_cita}}
                </td>
                <td>
                  {{$cita->tecnico->name}}
                </td>
                <td>
                  {{$cita->tecnico->telefono}}
                </td>
                <td>
                  {{$cita->Observaciones}}
                </td>
          
                <td>
                  <form action="{{url('/citas/'.$cita->Id_cita)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{url('/citas/'.$cita->Id_cita.'/edit')}}" class="btn btn-info"><i class="fas fa-pen"></i></a>
                    <button class="btn btn-danger" type="submit"><i class="fas fa-times"></i></button>
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

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-MX.json"></script>

<script>
  
  $(document).ready(function() {
    //$.fn.DataTable.ext.classes.sFilterInput = "form-control form-control-lg-10";
    var table = $('#citas').DataTable( {
      responsive:true,
      rowReorder: true,
      autoWidth: false,
        lengthChange: false,
        buttons: [ 'print', 'excel',
            {
                extend: 'pdf',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }, 'colvis'
        ],

        "language": {
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
        }, "buttons": {
        "print":"Imprimir",
        "copy": "Copiar",
        "colvis": "Columnas",
        "collection": "Colección",
    }
  }, lengthMenu:true,
       });
          // Use Btn-group to add the buttons. We are using two button groups here, one for view controls and another with column
          table.buttons().container()
        .appendTo( '#citas_wrapper .col-md-6:eq(0)' );
 
} );

</script>

@endsection

{{-- new DataTable('#citas',{
  responsive: true,
  autoWidth: false,
  lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
}); 


--}}

