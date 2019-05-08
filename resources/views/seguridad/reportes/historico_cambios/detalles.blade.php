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
        <li class="breadcrumb-item"><a href="{{url('Seguridad/Reportes')}}">Reportes</a></li>
        <li class="breadcrumb-item"><a href="{{url('Seguridad/Reportes/HistoricoCambios')}}">Histórico de cambios</a></li>
        <li class="breadcrumb-item active">Detalle</li>
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
            Detalle
          </h1>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
        </div>
        <div class="card-body">
          <table class="table table-hover table-striped table-sm">
            <thead style="background-color: #c1e7fc">
              <th>Usuario</td>
              <th>Fecha</td>
              <th>IP</td>
              <th>Acción</td>
              <th>Ruta</td>
            </thead>
            <tbody>
              <tr>
                <td>{{ $log->username }}</td>
                <td>{{ $log->created_at }}</td>
                <td>{{ $log->ip_address }}</td>
                <td>{{ $log->event }}</td>
                <td>{{ $log->url }}</td>
              </tr>
            </tbody>
            </table>  
            <br>
            <div class="col-sm-12 table-bordered">
              <h3>Registro anterior</h3>
              @if (!empty(json_decode($log->old_values, true)))
                @foreach (json_decode($log->old_values, true) as $old_key => $old_value)
                  <div class="col-sm-6 row">
                    <div class="col-sm-5 text-right table-bordered"><strong>
                      {{ $old_key }}:
                    </strong></div>
                    <div class="col-sm-7 table-bordered">{{ $old_value != null ? $old_value : 'Vacío' }}</div>
                  </div>
                @endforeach
              @else
                <div class="col-sm-3">
                  <div class="col-sm-12 table-bordered"><strong>Ninguno</strong></div>
                </div>
              @endif
            </div>
            <br>
            <div class="col-sm-12 table-bordered">
              <h3>Registro nuevo</h3>
              @if (!empty(json_decode($log->new_values, true)))
                @foreach (json_decode($log->new_values, true) as $new_key => $new_value)
                  <div class="col-sm-6 row">
                    <div class="col-sm-5 text-right table-bordered"><strong>
                      {{ $new_key }}:
                    </strong></div>
                    <div class="col-sm-7 table-bordered">{{ $new_value != null ? $new_value : 'Vacío' }}</div>
                  </div>
                @endforeach
              @else
                <div class="col-sm-3">
                  <div class="col-sm-12 table-bordered"><strong>Ninguno</strong></div>
                </div>
              @endif
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop

@section('after-scripts-end')
@stop
