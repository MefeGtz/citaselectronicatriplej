

<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">¡Bienvenido!</h6>
              </div>

              @if(auth()->user()->rol=='TecAdmin')
              <a href="admins/{{auth()->user()->id}}/edit" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Mi perfil</span>
              </a>
            @endif
            @if(auth()->user()->rol=='Tecnico')
            <a href="tecnicos/{{auth()->user()->id}}/edit" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>Mi perfil</span>
            </a>
          @endif
             
              <a href="/vercitas" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Mis citas</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
                <i class="ni ni-user-run"></i>
                <span>Cerrar Sesión</span>
                <form action="{{route('logout')}}" method="POST" style="display: none;" id="formLogout">
                @csrf
                </form>
              </a>
              
 </div>