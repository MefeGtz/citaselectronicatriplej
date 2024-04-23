@extends('layouts.panel')

@section('content')
<div class="row">
      <div class="container-fluid">
       <div class="header-body">
              <!-- Card stats -->
       
      </div>
     {{-- bloques --}}
     

<div class="header-body">
  <!-- Card stats -->
  <div class="row">
      <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
            <div class="row">
              <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">CITAS PARA HOY:</h5>
                  <span class="h1 font-weight-bold mb-0">{{$citashoy}}</span>
              </div>
               <div class="col-auto">
                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                  <i class="fas fa-chart-bar"></i>
                </div>
              </div>
          </div>
          @if($citas_completadas>0)
                  <p class="mt-3 mb-0 text-muted text-sm">
                  <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>COMPLETADAS</span>
                  <span class="text-nowrap">{{$citas_completadas}}</span>
                  </p>
            @endif
         </div>
      </div>
  </div>
  
  <div class="col-xl-3 col-lg-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h6 class="card-title text-uppercase text-muted mb-0">TECNICOS DISPONIBLES</h6>
            <span class="h1 font-weight-bold mb-0">5</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
              <i class="fas fa-users"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-xl-3 col-lg-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">CLIENTES</h5>
            <span class="h1 font-weight-bold mb-0">{{$cantclientes}}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
              <i class="fas fa-users"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 
  <div class="col-xl-3 col-lg-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Citas programadas proximos 10 dias</h5>
            <span class="h2 font-weight-bold mb-0">{{$areparar}}</span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
              <i class="fas fa-percent"></i>
            </div>
          </div>
        </div>     
       </div>
    </div>
      </div>
  </div>

</div>

{{-- graficas --}}
<br>
{{-- grafica de citas canceladas y citas completadas --}}
<div class="col-xs-12">

  
  <figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
    
    </p>
</figure>
  </div>

<br>
  {{-- grafica de citas canceladas y citas completadas desempeño medico --}}
<div class="col-xs-12">
  <figure class="highcharts-figure">
    <div id="containerbar">

    </div>
    <p class="highcharts-description">
    </p>
</figure>
  </div>

 

</div>

@endsection

@section ('scripts')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
{{-- para la grafica de frcuendcia de citas --}}
<script>
Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Citas por mes'
    },
    subtitle: {
       
    },
    xAxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },
    yAxis: {
        title: {
            text: 'Cantidad de citas'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Completadas',
        data: @json($conteocitasf) 
    }, {
        name: 'Canceladas',
        data: @json($conteocitasc)
    }]
});

</script>
<script src="{{asset('js/graficas/desempenotecnico.js')}}"></script>
@endsection























