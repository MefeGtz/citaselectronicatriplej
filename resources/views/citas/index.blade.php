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
            <h2 class="mb-0">Citas</h2>
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

         <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active"  data-toggle="tab" 
                    href="#citasprogramadas" role="tab" aria-selected="true">
                    <i class="ni ni-calendar-grid-58 mr-2"></i>Citas Programadas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" 
                    href="#citascanceladas" role="tab"  aria-selected="false">
                    <i class="fas fa-ban mr-2"></i> Citas Canceladas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 "  data-toggle="tab" 
                    href="#citasfinalizadas" role="tab" aria-selected="false">
                    <i class="fas fa-calendar-check mr-2"></i> Citas Completadas</a>
                </li>
            </ul>
        </div>
       
        
    </div>
    <div class="card shadow">
        <div class="card">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="citasprogramadas" role="tabpanel" >
                   @include('/citas.citasprogramadas')
                </div>
                <div class="tab-pane fade active" id="citascanceladas" role="tabpanel" >
                    @include('/citas.citascanceladas')
                </div>
                <div class="tab-pane fade active" id="citasfinalizadas" role="tabpanel" >
                    @include('/citas.citasfinalizadas')
                </div>
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

<script>
    new DataTable('#tabl', {
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


    $(document).ready(function() {
      //$.fn.DataTable.ext.classes.sFilterInput = "form-control form-control-lg-10";
      let table = $('#tabla3').DataTable( {
        responsive:true,
        autoWidth: false,
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
    },
      });
            // Use Btn-group to add the buttons. We are using two button groups here, one for view controls and another with colum
   
  } );



    </script>


@endsection
 {{-- 

@endsection


     
  $(document).ready(function() {
    //$.fn.DataTable.ext.classes.sFilterInput = "form-control form-control-lg-10";
    let table = $('#tabla').DataTable( {
      responsive:true,
      rowReorder: true,
      autoWidth: false,
        lengthChange: false,

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
        "next": "Siguiente",
        "previous": "Anterior"
        }, "buttons": {
        "print":"Imprimir",
        "copy": "Copiar",
        "colvis": "Columnas",
        "collection": "Colección",
    }
  },
    });
          // Use Btn-group to add the buttons. We are using two button groups here, one for view controls and another with colum
 
} );

    

    --}}