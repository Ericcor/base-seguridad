@extends ('layouts.master')

@section('page-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1><i class="fa fa-lock" style="font-size: 24px !important;"></i> Roles registrados </h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><i class="fa fa-lock"></i> Seguridad</li>
        <li class="breadcrumb-item active">Roles registrados</li>
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
          @if (auth()->user()->hasPermission(['35-02-01-02']))
          <a title="Crear usuario" class="btn btn-success" href="{{route('RolesRegistrados.create')}}"><i class="fa fa-plus"></i> Crear rol</a>
          @endif
          <button type="button" class="btn btn-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="callout col-sm-8 offset-sm-2" style="color: #737373;">
          <h4 style="font-size: 14px;"><i class="fa fa-info-circle" style="color: #ff0000;"></i> Nota:</h4>
          <span>Un rol no puede ser eliminado si esta asignado a un usuario.</span>
        </div>
        <table id="example1" class="table table-bordered table-striped table-hover table-sm">
          <thead>
            <tr class ="theadtable">
              <th class="ordenable" data-columna="name">Nombre</th>
              <th>Usuarios</th>
              <th class="text-center">Acción</th>
            </tr>
          </thead>
          <tbody>
            @foreach($roles as $rol)
            <tr>
              <td>{{$rol->name}}</td>
              <td>{{$rol->users()->count()}}</td>
              <td>
                @if(auth()->user()->hasPermission(['35-02-01-03']))
                  <a data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-sm btn-primary" href="{{route('RolesRegistrados.edit', $rol->id)}}"><i class="fa fa-pencil"></i></a>
                @endif
                @if(auth()->user()->hasPermission(['35-02-01-02']))
                  <a data-toggle="tooltip" data-placement="top" title="Crear clon" class="btn btn-sm btn-info" href="{{route('Seguridad.RolesRegistrados.createclon', $rol->id)}}"><i class="fa fa-clone"></i></a>
                @endif
                 @if(auth()->user()->hasPermission(['35-02-01-04']))
                  @if($rol->users()->count()==0 && $rol->name != "Administrador")
                    <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-sm btn-danger" href="#" OnClick="Eliminar('{{$rol->id}}')"><i class="fa fa-trash"></i></a>
                  @endif
                @endif 
              </td>
            </tr>
            @endforeach
          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>
@stop

@section('after-scripts-end')
@include('includes.scripts.roles')
@include('includes.scripts.scripts_ordenamiento_tablas')
@endsection

{{-- fin vista --}}
