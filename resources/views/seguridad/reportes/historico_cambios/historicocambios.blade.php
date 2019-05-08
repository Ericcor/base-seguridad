@extends ('layouts.master')

@section('page-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1><i class="fa fa-lock"></i> Histórico de cambios</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><i class="fa fa-lock"></i><a href="{{url('Seguridad/Reportes')}}">  Seguridad</a></li>
        <li class="breadcrumb-item "><a href="{{url('Seguridad/Reportes')}}">Reportes</a></li>
        <li class="breadcrumb-item active">Histórico de cambios</li>
      </ol>
    </div>
  </div>
</div>
@endsection

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
          <div class="table-responsive">
            <table class="table table-hover table-striped table-sm">
              <thead style="background-color: #c1e7fc">
                <th>Usuario</td>
                <th>Fecha</td>
                <th>IP</td>
                <th>Acción</td>
                <th>Ruta</td>
                <th>Detalle</td>
              </thead>
              <tbody>
                @foreach($logs as $log)
                  <tr>
                    <td>{{ $log->username }}</td>
                    <td>{{ $log->created_at }}</td>
                    <td>{{ $log->ip_address }}</td>
                    <td>{{ $log->event }}</td>
                    <td>{{ $log->url }}</td>
                    <td>
                      <a data-toggle="tooltip" data-placement="top" title="Ver detalles"  class="btn btn-sm btn-info" href="{{ route('Seguridad.Reportes.HistoricodeCambios.show', $log->id) }}"><i class="fa fa-eye"></i></a>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
          <br>
          <div class="col-sm-12">
            <div class="pull-right">
              {{ $logs->links() }}
            </div><br><br>
          </div>
          <br>
          <div class="card-footer">
            <div class="card-tools text-center">
              <a href="{{url('Seguridad/Reportes/Listado/HistoricoCambios/Reporte',
                array(
                  'tiporeporte' => 'XLS'
                )
              )}}" class="btn btn-primary btn-success" role="button">Exportar a excel</a>&nbsp;
              <a href="{{url('Seguridad/Reportes/Listado/HistoricoCambios/Reporte',
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

@stop

@section('after-scripts-end')

@stop
