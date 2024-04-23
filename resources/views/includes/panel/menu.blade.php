<!-- Navigation -->
<h6 class="navbar-heading text-muted">Gestion Clientes</h6>
  <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link  active " href="{{url('/clientes/create')}}">
              <i class="fa fa-user-plus text-default"></i> Registrar cliente
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/clientes')}}">
              <i class="fas fa-address-card text-success"></i> Ver Clientes
            </a>
          </li>
        </ul>

        <h6 class="navbar-heading text-muted">Gestion Aparato </h6>
        <ul class="navbar-nav">
        <li class="nav-item  ">
            <a class="nav-link" href="{{url('/aparato/create')}}">
              <i class="fas fa-edit text-default"></i> Registrar Aparato
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/aparato')}}">
              <i class="ni ni-tv-2 text-blue"></i> Ver aparatos
            </a>
          </li>
        @if(auth()->user()->rol=='TecAdmin')

          <li class="nav-item">
            <a class="nav-link " href="{{url('/marca')}}">
              <i class="ni ni-tv-2 text-blue"></i> Marcas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/tipoaparato')}}">
              <i class="ni ni-tv-2 text-blue"></i> Tipos de Aparatos
            </a>
          </li>
          @endif
        </ul>
       
        <h6 class="navbar-heading text-muted">Citas</h6>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/citas/create">
              <i class="fas fa-calendar-alt text-red"> </i> Crear Cita
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/vercitas">
              <i class="fas fa-file-alt text-blue"> </i> ver Citas
            </a>
          </li>
        </ul>

        <hr class="my-3">
        <!-- Heading -->
      <h6 class="navbar-heading text-muted">Reportes</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="/reportescita">
              <i class="ni ni-books text-default"></i> Citas
            </a>
          </li>
        @if(auth()->user()->rol=='TecAdmin')
          <li class="nav-item">
            <a class="nav-link" href="/desemptecnico">
              <i class="ni ni-chart-bar-32 text-warning"></i> Desempeño Técnicos
            </a>
          </li>
          @endif
        </ul>
        {{-- Gestion de usuarios solo para admis --}}
        @if(auth()->user()->rol=='TecAdmin')
      <h6 class="navbar-heading text-muted">Gestión de usuarios</h6>
        <ul class="navbar-nav">
     
        <li class="nav-item">
            <a class="nav-link " href="{{url('/admins')}}">
              <i class="fas fa-users text-red"></i> Usuarios
            </a>
          </li>
     
        <li class="nav-item">
            <a class="nav-link " href="{{url('/tecnicos')}}">
              <i class="	fas fa-user-tag text-blue"></i> Técnicos
            </a>
          </li>
        </ul>

        @endif
        <!-- Divider -->
        

        <h6 class="navbar-heading text-muted">Sesión</h6>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
              <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </a>
            <form action="{{route('logout')}}" method="POST" style="display: none;" id="formLogout">
            @csrf
            </form>
          </li>
        </ul>

