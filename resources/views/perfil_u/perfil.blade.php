@extends('layouts.master')

@section('page-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-5">
      <h1><i class="fa fa-user"></i> Mi perfil</h1>
    </div>
    <div class="col-sm-7">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><i class="fa fa-user"></i> Perfil de usuarios</li>
        <li class="breadcrumb-item active">Mi perfil</li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <!-- Line chart -->
    <div class="card card-warning card-outline">
      <div class="card-header">
        <h3 class="card-title">Perfil</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped table-hover table-sm">
          <tr>
            <th>Nombre</th>
            <td>{{ $user->name }}</td>
          </tr>
          <tr>
            <th>Usuario</th>
            <td>{{ $user->email }}</td>
          </tr>
          <tr>
            <th>Logo del usuario</th>
            @if (Auth::user()->logotipo == null)
              <td>
              <img src="{{ asset("img/logos/user.png") }}" class="user-profile-image" style="max-height: 150px; width: auto;"/>
              </td>
            @else
              <td>
              <img src="{{ asset("img/logos/".$user->logotipo) }}" class="user-profile-image" style="max-height: 150px; width: auto;"/>
              </td>
            @endif
          </tr>
          <tr>
            <th>Acciones</th>
            <td>
            {!! link_to_route('PerfilUsuario.changePasword', 'Cambiar la contraseña', ['id' => $user->id], ['class' => 'btn btn-warning btn-xs']) !!}

            {!! link_to_route('PerfilUsuario.changeImage', 'Cambiar el logotipo ', ['id' => $user->id], ['class' => 'btn btn-primary btn-xs']) !!}
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
