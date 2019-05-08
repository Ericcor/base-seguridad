@extends ('layouts.master')
@section('page-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1><i class="fa fa-lock" style="font-size: 24px !important;"></i> Reportes </h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><i class="fa fa-lock"></i> Seguridad</a></li>
        <li class="breadcrumb-item active">Reportes</li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('content')
<style>
  .badge-eps{margin: 2px 1px 3px 2px;}
</style>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header card-warning card-outline">
        <h3 class="card-title">Listado</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped table-hover table-sm">
          <thead>
            <tr class ="theadtable">
              <th><center>Código</center></th>
              <th><center>Nombre del reporte</center></th>
              <th><center>Formato</center></th>
              <th><center>Estado</center></th>
              <th><center>Acción</center></th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td>1</td>
              <td>Usuarios</td>
              <td class="text-center">
                <span class="badge badge-success"><i class="fa fa-file-excel-o badge-eps"></i></i></span>
                <span class="badge badge-danger"><i class="fa fa-file-pdf-o badge-eps"></i></i></span>
              </td>
              <td class="text-center">
                <span class="badge badge-success">Disponible &nbsp;&nbsp;<i class="fa fa-tag"></i></span>
              </td>

              <td style="text-align: center;">
                <a class="btn btn-sm btn-info" href="{{url('Seguridad/Reportes/Usuarios')}}" data-toggle="tooltip" data-placement="top" title="Ver reporte"><i class="fa fa-eye"></i></a>
              </td>
            </tr>

            <tr>
              <td>2</td>
              <td>Roles</td>
              <td class="text-center" style="margin: 2px;">
                  <span class="badge badge-success"><i class="fa fa-file-excel-o badge-eps"></i></i></span>
                  <span class="badge badge-danger"><i class="fa fa-file-pdf-o badge-eps"></i></i></span>
                </td>
              <td class="text-center">
                <span class="badge badge-success">Disponible &nbsp;&nbsp;<i class="fa fa-tag"></i></span>
              </td>
              <td style="text-align: center;">
                <a class="btn btn-sm btn-info" href="{{url('Seguridad/Reportes/Roles')}}" data-toggle="tooltip" data-placement="top" title="Ver reporte"><i class="fa fa-eye"></i></a>
              </td>
            </tr>


            <tr>
              <td>3</td>
              <td>Histórico de cambios</td>
              <td class="text-center" style="margin: 2px;">
                  <span class="badge badge-success"><i class="fa fa-file-excel-o badge-eps"></i></i></span>
                  <span class="badge badge-danger"><i class="fa fa-file-pdf-o badge-eps"></i></i></span>
                </td>
              <td class="text-center">
                <span class="badge badge-success">Disponible &nbsp;&nbsp;<i class="fa fa-tag"></i></span>
              </td>
              <td style="text-align: center;">
                <a class="btn btn-sm btn-info" href="{{url('Seguridad/Reportes/HistoricoCambios')}}" data-toggle="tooltip" data-placement="top" title="Ver reporte"><i class="fa fa-eye"></i></a>
              </td>
            </tr>

          </tbody>
        </table>
        <br>

        <div class="card-footer">
            <div class="card-tools text-center">
              <a href="{{url('Seguridad/Reportes/Listado/Reporte',
                array(
                  'tiporeporte' => 'XLS'
                )
              )}}" class="btn btn-primary btn-success" role="button">Exportar a excel</a>&nbsp;
              <a href="{{url('Seguridad/Reportes/Listado/Reporte',
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
@stop
{{--Fin--}}
@section('after-scripts-end')

@stop
