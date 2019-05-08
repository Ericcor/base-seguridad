<aside class="main-sidebar sidebar-dark-primary">

  <a class="brand-link bg-white col-sm-12" style="display: inline-block; height: 57px;">
    <!--<img class="brand-image" src="{{asset('/img/')}}">-->
  </a>

  <div class="sidebar slimScroll">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img @if( Auth::user()->logotipo != null ) src="{{ asset('img/logos/'. Auth::user()->logotipo) }}" @else  src="{{ asset('img/logos/user.png')}}"@endif class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block text-white">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <nav class="mt-2 mb-sidebar-body">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header text-uppercase">Menú de navegación</li>
        <!-- PERMISOS -->
        <?php 
        
          /* Seguridad */
          $verSegActivos = config('permissions.v_SegUserActivos');
          $CrearSegActivos = config('permissions.c_SegUser');
          $EditSegActivos = config('permissions.m_SegUser');
          $EliminarSegActivos = config('permissions.e_SegUser');
          $verSegInactivos = config('permissions.v_SegUserInactivos');
          $verSegEliminados = config('permissions.v_SegUserEliminados');

          $VerSegRol = config('permissions.v_SegRol');
          $CrearSegRol = config('permissions.c_SegRol');
          $EditSegRol = config('permissions.m_SegRol');
          $EliminarSegRol = config('permissions.e_SegRol');

          $VerSegRep = config('permissions.v_SegReport');
          $VerSegPass = config('permissions.v_SegPass');
          $EditSegPass = config('permissions.m_SegPass');

          /* Fin seguridad */

        ?>   
        <!-- end PERMISOS -->
        <!-- Menu -->
        @include('includes.sidebar.inicio')


        @include('includes.sidebar.seguridad')

        @include('includes.sidebar.perfil_usuario')
        <!-- Fin menu -->
      </ul>
    </nav>
  </div>
</aside>
