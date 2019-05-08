<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom fixed-navbar">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" style="color: #000000;"><i class="fa fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false" style="color: #000000;">
        <i class="fa fa-user"></i> {{ Auth::user()->name }}
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="user-header" style="height: auto;text-align: center;background-color: #222733;padding: 8%;border-radius: 3px;">
          <img @if( Auth::user()->logotipo != null ) src="{{ asset('img/logos/'. Auth::user()->logotipo) }}" @else  src="{{ asset('img/logos/user.png')}}"@endif class="img-circle" alt="User Image" width="120" height="120"/>
          <p style="color:rgba(255, 255, 255, 0.8);margin-top: 10px;"> {{ Auth::user()->name }}</p>
          <p style="color:rgba(255, 255, 255, 0.8);"><small>Miembro desde  {{ Auth::user()->created_at }} </small></p>
        </div>

        <div style="padding: 3%;content: ' ';display: table;width: 100%;">
          <div class="float-left">
            <a href="{{url('PerfilUsuario/MiPerfil')}}" class="btn btn-default">Perfil</a>
          </div>
          <div class="float-right">
            <a href="{{ route('logout') }}" class="btn btn-default" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesión</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

          </div>
        </div>
      </div>
    </li>
  </ul>
</nav>
  <!-- /.navbar -->
