@extends ('layouts.master')
{{--Inicio--}}
@section('page-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1><i class="fa fa-lock" style="font-size: 24px !important;"></i> {{$status}}</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><i class="fa fa-lock"></i> Seguridad</li>
        <li class="breadcrumb-item">Usuarios</li>
        <li class="breadcrumb-item">{{$status}}</li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header card-warning card-outline">
        <h3 class="card-title">Listado</h3>
        <div class="card-tools">
          @if( $status == 'Activos')
          @if (auth()->user()->hasPermission(['35-01-01-02']))
          <a title="Crear usuario" class="btn btn-success" href="{{route('Seguridad.Usuarios.create')}}"><i class="fa fa-plus"></i> Crear usuario</a>
          @endif
          @endif
          <button type="button" class="btn btn-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped table-hover table-sm">
            <thead>
              <tr class ="theadtable">
                 <th class="ordenable" data-columna="name">Nombre</th>
                <th class="ordenable" data-columna="email">Usuario</th>
                <th>Roles</th>
                <th class="ordenable" data-columna="created_at" >Creado</th>
                <th><center>Acción</center></th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td nowrap>{{ $user->name }}</td>
                <td nowrap >{{ $user->email }}</td>
                <td>@if (count($user->roles) != 0 ) {{ $user->roles->pluck('name')->implode(', ') }} @else ningun rol asociado @endif</td>
                <td nowrap>{{  $user->created_at }}</td>
                <td nowrap >
                  <!-- verifica si tiene permiso -->
                  @if($status == 'Activos' || $status == 'Inactivos')
                  @if (auth()->user()->hasPermission(['35-01-01-03']))
                  <a data-toggle="tooltip" data-placement="left" title="Editar" class="btn btn-sm btn-primary" href="{{route('Seguridad.Usuarios.edit',[$status,$user->id])}}"><i class="fa fa-pencil"></i></a>
                  @endif
                  @endif

                  @if($status == 'Activos' || $status == 'Inactivos')
                  @if (auth()->user()->hasPermission(['35-01-01-03']))
                  <a data-toggle="tooltip" data-placement="left" title="Cambiar contraseña" class="btn btn-sm btn-info" href="{{route('Seguridad.Usuarios.ChangePassword',[$status,$user->id])}}"><i class="fa fa-key"></i></a>
                  @endif
                  @endif

                  @if(($status == 'Activos' || $status == 'Inactivos') && auth()->user()->id != $user->id)
                  @if (auth()->user()->hasPermission(['35-01-01-04']))
                  <meta name="csrf-token" content="{{ csrf_token() }}">
                  <a data-toggle="tooltip" data-placement="left" title="Eliminar" class="btn btn-sm btn-danger" href="#" OnClick="Eliminar('{{$user->id}}')"><i class="fa fa-trash"></i></a>
                  @endif
                  @endif

                  @if( $status == 'Activos' && auth()->user()->id != $user->id)
                  @if (auth()->user()->hasPermission(['35-01-01-03']))
                  <a data-toggle="tooltip" data-placement="left" title="Desactivar usuario" class="btn btn-sm btn-warning" href="#" OnClick="Desactivar('{{$user->id}}')" ><i class="fa fa-pause"></i></a>
                  @endif
                  @endif
                  @if( $status == 'Inactivos')
                  @if (auth()->user()->hasPermission(['35-01-01-03']))
                  <a data-toggle="tooltip" data-placement="left" title="Activar usuario" class="btn btn-sm btn-success" href="#" OnClick="Activar('{{$user->id}}')"><i class="fa fa-play"></i></a>
                  @endif
                  @endif
                  @if( $status == 'Eliminados')
                  @if (auth()->user()->hasPermission(['35-01-01-03']))
                  <center>
                    <a data-toggle="tooltip" data-placement="left" title="Restaurar usuario" class="btn btn-sm btn-primary" href="#" OnClick="Restaurar('{{$user->id}}')"><i class="fa fa-refresh"></i></a>
                  </center>
                 
                  @endif
                  @endif
                </td>
              </tr>
              @endforeach

            </tbody>

          </table>
        </div>
        <br>
        <div class="col-sm-12">
          <div class="pull-right">
            {!! $users->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
@section('after-scripts-end')
@include('includes.scripts.usuarios')
@include('includes.scripts.scripts_ordenamiento_tablas')
@endsection
