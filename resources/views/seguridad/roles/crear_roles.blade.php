@extends ('layouts.master')

@section('page-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1><i class="fa fa-lock" style="font-size: 24px !important;"></i> Roles registrados </h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('Seguridad/RolesRegistrados')}}"><i class="fa fa-lock"></i> Seguridad</a></li>
        <li class="breadcrumb-item"><a href="{{url('Seguridad/RolesRegistrados')}}">Roles registrados</li></a>
        <li class="breadcrumb-item active">Crear</li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('content')
{!! Form::open(['route' => 'RolesRegistrados.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-role']) !!}
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header card-warning card-outline">
        <h3 class="card-title">Crear</h3>
        <div class="card-tools pull-right">
          <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="card-body">

        <div class="box-body">
          <div class="form-group row offset-sm-3">
            <div class="col-sm-6">
              @include('includes.messages')
            </div>
          </div>

          <div class="callout col-sm-8 offset-sm-2" style="color: #737373;">
            <h4 style="font-size: 14px;"><i class="fa fa-info-circle" style="color: #ff0000;"></i> Nota:</h4>
            <span>Los campos marcados con un asterisco (*) son obligatorios.</span>
          </div><br>

          <div class="form-group row">
            {!! Form::label('name', 'Nombre (*)', ['class' => 'col-sm-3 col-form-label']) !!}
            <div class="col-sm-6">
              {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Rol']) !!}
            </div><!--col-sm-10-->
          </div><!--form control-->

          <div class="form-group row">
            {!! Form::label('associated-permissions','Permisos asociados (*)', ['class' => 'col-sm-3 col-form-label']) !!}

            <div class="col-sm-6 ">
              {!! Form::select('associated-permissions', array('all' => trans('labels.general.all'), 'custom' => trans('labels.general.custom')), 'all', ['class' => 'form-control']) !!}
            </div>
            <div class="col-sm-8 offset-sm-2">
              <div id="available-permissions" class="hide mt-20">
                <div class="row">
                  <div class="col-sm-12">
                    @forelse ($permissions as $module => $permisos)
                    <fieldset class="col-sm-12" style="border: 1px solid #e5e5e5">
                      <legend style="padding: 0 12px;">
                        <b>Permisos para el módulo de {{ $module }}:</b>
                        <div class="pull-right">
                          <small><i>Seleccionar todos</i></small>
                          &nbsp;
                          <input type="checkbox" id="{{ $module }}" onclick="seleccionarTodos('{{$module }}')">
                        </div>
                      </legend>
                      @foreach ($permisos as $perm)
                      <div class="col-sm-6">
                        <input type="checkbox" class="{{ $module }} form-check-input col-form-label" name="permissions[]" value="{{ $perm->id }}" id="perm_{{ $perm->id }}"   />
                        <label class="form-check-label col-sm-12" for="perm_{{ $perm->id }}">{{ $perm->display_name }}</label><br/>
                      </div>
                      @endforeach
                    </fieldset>
                    @empty
                    <p>No hay permisos disponibles.</p>
                    @endforelse
                  </div><!--col-sm-6-->
                </div><!--row-->
              </div><!--available permissions-->
            </div><!--col-sm-3-->
          </div><!--form control-->

          <div class="form-group row">
            <div class="col-sm-10">
              {!! Form::hidden('sort', ($role_count+1), ['class' => 'form-control', 'placeholder' => 'Orden']) !!}
            </div><!--col-sm-10-->
          </div><!--form control-->

          <div class="form-group row">
            <div class="col-sm-12">
              <div class="text-center">
                {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-sm','title'=>'Guardar']) !!}
                {!! link_to_route('RolesRegistrados.index','Cancelar', [], ['class' => 'btn btn-danger btn-sm','title'=>'Cancelar']) !!}
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}
@stop

@section('after-scripts-end')
  @include('includes.scripts.roles')
<script type="text/javascript" >
  function chearEstado(module) {
    if ($('input.' + module).not(':checked').length > 0) {
      $('input#' + module).prop('checked', false);
    } else if ($('input.' + module).not(':checked').length == 0) {
      $('input#' + module).prop('checked', true);
    }
  }

  $("input:checkbox").click(function() {
    module = $(this).attr("class");
    chearEstado(module);
  });

  function seleccionarTodos(module) {
    if ($("#" + module).not(':checked').length == 0) {
      $("." + module).prop('checked', true);
    } else {
      $("." + module).prop('checked', false);
    }
  };
</script>
  @include('includes.scripts.ocultar_permisos')
@stop
{{-- fin de la vista --}}
