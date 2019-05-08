@extends ('layouts.master')
@section('page-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1><i class="fa fa-lock" style="font-size: 24px !important;"></i> Complejidad </h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><i class="fa fa-lock"></i> Seguridad</li>
        <li class="breadcrumb-item active">Contraseña </li>
        <li class="breadcrumb-item active"> Complejidad </li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('content') 
@if (auth()->user()->hasPermission(['35-04-01-03']))
<div class="row">
<div class="col-md-12">
  <!-- Line chart -->
  <div class="card card-warning card-outline">
    <div class="card-header">
      <h3 class="card-title">Actualizar</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
        <div class="box-body">
            <div class="col-sm-12 form-horizontal">
              {!! Form::open(['route' => 'Seguridad.Contrasena.Complejidad.update_Multiple', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post','id'=>'form-create']) !!}
                <div class="form-group row ">
                {!! Form::label('Requerimientos(*)', null, array('class' => 'col-sm-3 col-form-label')) !!}
                    <div class="col-sm-6">
                        <label class="radio offset-sm-1" onclick="habilitarBoton()">
                        @if($activas==1)
                            {{ Form::radio('status', '1', 'checked') }} Activar todos
                        @else
                        {{ Form::radio('status', '1') }} Activar todos
                        @endif
                        </label>
                        <label class="radio offset-sm-1" onclick="habilitarBoton()">
                        @if($inactivas==1)
                        {{ Form::radio('status', '0', 'checked') }}  Ninguno
                        @else
                        {{ Form::radio('status', '0') }} Ninguno
                        @endif
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3 offset-sm-6">
                        <div class="pull-right">
                        <button id="actualizar" class="btn btn-success btn-sm" onclick="actualizarOperacion()" disabled>Actualizar</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
  </div>
</div>
</div>
@endauth
 {!! Form::close() !!}
<div class="row">
    <div class="col-md-12">
      <!-- Line chart -->
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Listado</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <table id="EmpresasOrdenantes" class="table table-striped table-sm">
            <thead>
              <tr style="background-color: #c2e7fc;">
              <th class="text-center ordenable" data-columna="cod_requirement">Código</th>
              <th class="text-center ordenable" data-columna="name">Nombre</th>
              <th class="text-center ordenable" data-columna="description">Descripción</th>
              <th class="text-center ordenable" data-columna="value">Valor</th>
              <th class="text-center ordenable" data-columna="message">Mensaje al usuario</th>
              <th class="text-center ordenable" data-columna="regex">Requerido</th>
              <th class="text-center ordenable" data-columna="status">Estatus</th>
              <th class="text-center">Acción</th>
              </tr>
            </thead> 
            <tbody>
             @foreach ($requerimientos as $registro)
            <tr>
                <td>{{ $registro->cod_requirement }}</td>
                <td>{{ $registro->name }}</td>
                <td>{{ $registro->description }}</td>
                <td>{{ $registro->value }}</td>
                <td>{{ $registro->message }}</td>
                 @if ($registro->regex == 0)
                <td><center><span class="text-white badge badge-success"  style="font-size: 13px;">Si</span></center></td>
                @else
                <td><center><span class="text-white badge badge-danger"  style="font-size: 11px;">No</span></center></td>
                @endif
                <td>
                @if ($registro->status == 1)
                <span class="text-white badge badge-success"  style="font-size: 13px;">{{ $registro->status_tra }}</span>
                @else
                <span class="text-white badge badge-danger"  style="font-size: 11px;">{{ $registro->status_tra }}</span>
                @endif
               </td>
                <td>

                @if (auth()->user()->hasPermission(['35-04-01-03']))
                <center><a data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-sm btn-primary" href="{{route('Seguridad.Contrasena.Complejidad.edit', $registro->id)}}"><i class="fa fa-pencil"></i></a></center>
                @endauth

                </td>
            </tr>
            @endforeach 
          </tbody>
          </table>
          <br>
          <div class="col-sm-12">
            <div class="pull-right">
            </div>
          </div>
        </div>
      </div>
    </div>
</div> 


  @endsection
  @section('after-scripts-end')
    @include('includes.scripts.scripts_complejidad')
    @include('includes.scripts.scripts_ordenamiento_tablas')
  @stop
