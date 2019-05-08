@if (auth()->user()->hasPermissionModule('seguridad'))
  @if(auth()->user()->hasPermission([$verSegActivos,$CrearSegActivos,$EditSegActivos,$EliminarSegActivos,$verSegInactivos,$verSegEliminados,$VerSegRol,$CrearSegRol,$EditSegRol,$EliminarSegRol,$VerSegRep,$VerSegPass,$EditSegPass]))
  <!-- Seguridad -->
    <li class="nav-item has-treeview {{ routeIs('Seguridad/*') }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-lock"></i>
        <p>Seguridad<i class="right fa fa-angle-left"></i></p>
      </a>
      <ul class="nav nav-treeview">
        @if(auth()->user()->hasPermission([$verSegActivos,$CrearSegActivos,$EditSegActivos,$EliminarSegActivos,$verSegInactivos,$verSegEliminados]))
          <li class="nav-item has-treeview {{ routeIs('Seguridad/Usuarios/*') }}">
            <a href="#" class="nav-link {{routeIs('Seguridad/Usuarios/*','active')}}">
              <i class="nav-icon fa fa-lock"></i>
              <p>Usuarios
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(auth()->user()->hasPermission([$verSegActivos,$CrearSegActivos,$EditSegActivos,$EliminarSegActivos]))
              <li class="nav-item">
                <a href="{{url('Seguridad/Usuarios/Activos')}}" class="nav-link {{ routeIs(['Seguridad/Usuarios/Activos', 'Seguridad/Usuarios/Activos/Crear', 'Seguridad/Usuarios/Activos/Edit/*', 'Seguridad/Usuarios/Activos/CambiarContrasena/*'], 'active') }}">
                  <i class="fa fa-lock nav-icon"></i>
                  <p>Activos</p>
                </a>
              </li>
              @endif
              @if(auth()->user()->hasPermission([$verSegInactivos,$EditSegActivos,$EliminarSegActivos]))
              <li class="nav-item">
                <a href="{{url('Seguridad/Usuarios/Inactivos')}}" class="nav-link {{ routeIs(['Seguridad/Usuarios/Inactivos', 'Seguridad/Usuarios/Inactivos/Edit/*', 'Seguridad/Usuarios/Inactivos/CambiarContrasena/*'], 'active') }}">
                  <i class="fa fa-lock nav-icon"></i>
                  <p>Inactivos</p>
                </a>
              </li>
              @endif
              @if(auth()->user()->hasPermission([$verSegEliminados,$EditSegActivos]))
              <li class="nav-item">
                <a href="{{url('Seguridad/Usuarios/Eliminados')}}" class="nav-link {{ routeIs('Seguridad/Usuarios/Eliminados', 'active') }}">
                  <i class="fa fa-lock nav-icon"></i>
                  <p>Eliminados</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
        @endif
        @if(auth()->user()->hasPermission([$VerSegRol,$CrearSegRol,$EditSegRol,$EliminarSegRol]))
          <li class="nav-item">
            <a href="{{url('Seguridad/RolesRegistrados')}}" class="nav-link {{ routeIs(['Seguridad/RolesRegistrados', 'Seguridad/RolesRegistrados/*'], 'active') }}">
              <i class="fa fa-lock nav-icon"></i>
              <p>Roles registrados</p>
            </a>
          </li>
        @endif
        @if(auth()->user()->hasPermission([$VerSegRep]))
          <li class="nav-item has-treeview">
            <a href="{{url('Seguridad/Reportes')}}" class="nav-link {{ routeIs(['Seguridad/Reportes','Seguridad/Reportes/*'], 'active') }}">
              <i class="fa fa-lock nav-icon"></i>
              <p>Reportes</p>
            </a>
          </li>
        @endif
        @if(auth()->user()->hasPermission([$VerSegPass,$EditSegPass]))
          <li class="nav-item has-treeview {{ routeIs('Seguridad/Contrasena/*') }}">
            <a href="#" class="nav-link {{routeIs('Seguridad/Contrasena/*','active')}}">
              <i class="nav-icon fa fa-lock"></i>
              <p>contraseña
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('Seguridad/Contrasena/Complejidad')}}" class="nav-link {{ routeIs(['Seguridad/Contrasena/Complejidad','Seguridad/Contrasena/Complejidad/*'], 'active') }}">
                  <i class="fa fa-lock nav-icon"></i>
                  <p>Complejidad</p>
                </a>
              </li>
            </ul>
          </li>
        @endif
      </ul>
    </li>
  @endif
  <!-- /.Seguridad -->
@endif
