<li class="nav-item has-treeview {{routeIs(['PerfilUsuario/MiPerfil','PerfilUsuario/MiPerfil/CambiarContrasena/*','PerfilUsuario/MiPerfil/CambiarLogotipo/*'])}}">
  <a href="#" class="nav-link">
    <i class="nav-icon fa fa-user"></i>
    <p>Perfil<i class="right fa fa-angle-left"></i></p>
  </a>
  <ul class="nav nav-treeview {{routeIs('PerfilUsuario/MiPerfil')}}">
    <li class="nav-item">
      <a href="{{url('PerfilUsuario/MiPerfil')}}" class="nav-link {{routeIs(['PerfilUsuario/MiPerfil','PerfilUsuario/MiPerfil/CambiarContrasena/*','PerfilUsuario/MiPerfil/CambiarLogotipo/*'],'active')}}">
        <i class="fa fa-user nav-icon"></i>
        <p>Mi perfil</p>
      </a>
    </li>
  </ul>
</li>




