@extends ('layouts.master')

{{--Inicio Roles--}}

@section('page-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1><i class="fa fa-lock"></i> Roles</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><i class="fa fa-lock"></i><a href="{{url('Seguridad/Reportes')}}"> Seguridad</a></li>
        <li class="breadcrumb-item"><a href="{{url('Seguridad/Reportes')}}">Reportes</a></li>
        <li class="breadcrumb-item active">Roles</li>
      </ol>
    </div>
  </div>
</div>
@endsection

{{--Inicio Listado--}}

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-warning card-outline">
        <div class="card-header">
          <h1 class="card-title">
            Listado
          </h1>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
        </div>
        <div class="card-body">
          <table class="table table-hover table-striped table-sm">
            <thead style="background-color: #c1e7fc">
              <th>Nombre</th>
              <th>Usuarios</th>
              <th>Permisos</th>
            </thead>
            <tbody>
            @foreach($roles as $role)
              <tr>
                <td>{{ $role->name }}</td>
                <td>{{ $role->users->count() }}</td>
                <td class="text-justify">@if($role->todos != 0) Todos @else <ul> @foreach($role->permissions as $registro ) 
                  <li>{{ $registro->display_name }}</li> @endforeach  <ul> @endif  </td>
              </tr>
            @endforeach
            </tbody>
            </table>
            <br>
              <div class="col-sm-12">
                <div class="pull-right">
                  {{ $roles->links() }}
                </div><br><br>
            </div>
            <br>
            <div class="card-footer">
                <div class="card-tools text-center">
                  <a href="{{url('Seguridad/Reportes/Listado/Roles/Reporte',
                    array(
                      'tiporeporte' => 'XLS'
                    )
                  )}}" class="btn btn-primary btn-success" role="button">Exportar a excel</a>&nbsp;
                  <a href="{{url('Seguridad/Reportes/Listado/Roles/Reporte',
                    array(
                      'tiporeporte' => 'PDF'
                    )
                  )}}" class="btn btn-primary btn-danger" role="button">Exportar a pdf</a>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{--Fin Listado--}}

@stop
{{--Fin Roles--}}

@section('after-scripts-end')

@stop

