@extends ('layouts.master')

{{--Inicio Usuarios--}}

@section('page-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1><i class="fa fa-lock" style="font-size: 24px !important;"></i> Usuarios </h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('Seguridad/Reportes')}}"><i class="fa fa-lock"></i> Seguridad</a></li>
        <li class="breadcrumb-item"><a href="{{url('Seguridad/Reportes')}}">Reportes</a></li>
        <li class="breadcrumb-item active">Usuarios</li>

      </ol>
    </div>
  </div>
</div>
@endsection


{{--Inicio Totales--}}

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-warning card-outline">
        <h5 class="card-title">Totales</h5>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-4">
              <div class="card card-total">
                <div class="card-body">
                  <div class="row">
                    <span class="box-icon-eps" style="background: #79c447;"><i class="fa fa-check icon-box-eps"></i></span>
                    <div class="row col-md-7" style="margin-left: auto;">
                      <span class="card-text" style="font-size: 15px">Activos<br>
                      <p class="number-box-eps">{{ $activos }}</p></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card card-total">
                <div class="card-body">
                  <div class="row">
                    <span class="box-icon-eps" style="background: #3c8dbc;"><i class="fa fa-pause icon-box-eps"></i></span>
                    <div class="row col-md-7" style="margin-left: auto;">
                      <span class="card-text" style="font-size: 15px">Inactivos<br>
                      <p class="number-box-eps">{{ $inactivos }}</p></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card card-total">
                <div class="card-body">
                  <div class="row">
                    <span class="box-icon-eps" style="background: #ff2323;"><i class="fa fa-trash icon-box-eps"></i></span>
                    <div class="row col-md-7" style="margin-left: auto;">
                      <span class="card-text" style="font-size: 15px">Eliminados<br>
                      <p class="number-box-eps">{{ $eliminados }}</p></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- ./card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-primary card-outline">
        <h5 class="card-title">Listado</h5>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-striped table-sm" id="icono-tabla">
          <thead class="thead-primary">
            <tr style="background-color: #c2e7fc;">
              <th>Nombre</th>
              <th>Email</th>
              <th>Roles</th>
              <th>Estado</th>
            </tr>
          </thead>
          @foreach($usuarios as $usuario)
          <tr>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->roles()->pluck('name')->implode(', ') }}</td>
            <?php $status = $usuario->status == 1 ? ['Activo', 'success'] : ['Inactivo', 'primary']; ?>
            <?php $status = $usuario->deleted_at != null ? ['Eliminado', 'danger'] : $status; ?>
            <td>
              <span class="badge badge-{{ $status[1] }}">{{ $status[0] }} &nbsp;&nbsp;</span>
          </tr>
          @endforeach
        </table>
        <br>
        <div class="col-12">
          <div class="pull-right">
            {!! $usuarios->links() !!}
          </div><br><br>
        </div><br>

        <div class="card-footer">
            <div class="card-tools text-center">
              <a href="{{url('Seguridad/Reportes/Listado/Usuarios/Reporte',
                array(
                  'tiporeporte' => 'XLS'
                )
              )}}" class="btn btn-primary btn-success" role="button">Exportar a excel</a>&nbsp;
              <a href="{{url('Seguridad/Reportes/Listado/Usuarios/Reporte',
                array(
                  'tiporeporte' => 'PDF'
                )
              )}}" class="btn btn-primary btn-danger" role="button">Exportar a pdf</a>
            </div>
          </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

@stop
{{--Fin Usuarios--}}
@section('after-styles-end')
  <style type="text/css">
    .box-icon-eps {
      border-top-left-radius: 4px;
      border-top-right-radius: 4px;
      border-bottom-right-radius: 4px;
      border-bottom-left-radius: 4px;
      float: left;
      height: 50px;
      width: 50px;
      text-align: center;
      font-size: 0px;
      line-height: 65px;
      color: white;

    }
    .icon-box-eps {
      font-size: 20px !important;
    }
    .number-box-eps {
      display: block;
      font-weight: bold;
      bottom: auto;
      text-align: center;
    }
    .card-total {
      width: 19rem;
    }
    .card-total .card-body{
      margin-bottom: -8px;
    }
  </style>
@endsection

@section('after-scripts-end')
@stop
