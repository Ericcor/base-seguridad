@extends ('layouts.master')
@section('page-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1><i class="fa fa-lock"></i> Complejidad</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><i class="fa fa-lock"></i><a href="{{url('Seguridad/Contrasena/Complejidad')}}"> Seguridad</a></a></li>
        <li class="breadcrumb-item"><a href="{{url('Seguridad/Contrasena/Complejidad')}}">Contraseña</a></li>
        <li class="breadcrumb-item"><a href="{{url('Seguridad/Contrasena/Complejidad')}}">Complejidad</a></li>
        <li class="breadcrumb-item active">Editar</li>
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
          <h3 class="card-title">Editar</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        {{ Form::model($requerimiento, ['route' => ['Seguridad.Contrasena.Complejidad.update', $requerimiento], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id'=>'form-edit']) }}
        <div class="card-body">
        <div class="callout col-sm-8 offset-sm-2" style="color: #737373;">
          <h4 style="font-size: 14px;"><i class="fa fa-info-circle" style="color: #ff0000;"></i> Nota:</h4>
          <span>Los campos marcados con un asterisco (*) son obligatorios.</span>
          <span> Cuidado al editar las expresiones regulares </span>
        </div>
        <div class="card-body">

          <div class="form-group row">
            <div class="col-md-7 offset-md-2">
              @include('includes.messages')
            </div>
          </div>
         

          <div class="form-group row col-md-12">
            {!! Form::label('Código', 'Código tipo de operación', array('class' => 'col-sm-3 col-form-label')) !!}
            <div class="col-sm-6">
              {!!Form::text('cod_requirement', null, ['id'=>'cod_requirement','class'=>'form-control', 'disabled' => 'disabled'])!!}
            </div>
          </div>

           <div class="form-group row col-md-12">
           {!! Form::label('Nombre', 'Nombre', array('class' => 'col-sm-3 col-form-label')) !!}
            <div class="col-sm-6">
              {!!Form::text('name', null, ['id'=>'name','class'=>'form-control'])!!}
            </div>
          </div>
     
          <div class="form-group row col-md-12">
           {!! Form::label('Valor', 'Valor', array('class' => 'col-sm-3 col-form-label')) !!}
            <div class="col-sm-6">
              @if($requerimiento->regex == 0)
              {!!Form::text('value', null, ['id'=>'name','class'=>'form-control'])!!}
              @else
              {!!Form::text('value', null, ['id'=>'name','class'=>'form-control', 'disabled' => 'disabled'])!!}
              @endif
            </div>
          </div>

          <div class="form-group row">
            {!! Form::label('estatus (*)', null, array('class' => 'col-sm-3 col-form-label')) !!}
            <div class="col-sm-6">
              <label class="radio-inline">
                  {{ Form::radio('status', 1) }} Activo
              </label>
              <label class="radio-inline">
                  {{ Form::radio('status', 0) }} inactivo
              </label>
            </div>
          </div>

          <div class="form-group row col-md-12">
           {!! Form::label('Requerido', 'Requerido', array('class' => 'col-sm-3 col-form-label')) !!}
            <div class="col-sm-6">
              {!!Form::text('required', null, ['id'=>'name','class'=>'form-control' , 'disabled' => 'disabled'])!!}
            </div>
          </div>

          <div class="form-group row col-md-12">
          {!!Form::label(' Descripción:', null, array('class' => 'col-sm-3 col-form-label'))!!}
                  <div class="col-sm-6">
                    {!! Form::textarea('description', null, ['class' => 'form-control col-sm-12', 'maxlength' => '199', 'rows' => "3"]) !!}
                  </div>
          </div>
          <div class="form-group row col-md-12">
          {!!Form::label('Mensaje usuario:', 'Mensaje usuario:', array('class' => 'col-sm-3 col-form-label'))!!}
            <div class="col-sm-6">
              {!! Form::textarea('message', null, ['class' => 'form-control col-sm-12', 'maxlength' => '199', 'rows' => "3"]) !!}
            </div>
          </div>

          
        </div>
        <!-- /.card-body-->
        <div class="form-group row">
          <div class="col-sm-6 col-sm-offset-3">
            <div class="pull-right">
              {{ Form::submit('Actualizar', ['class' => 'btn btn-success btn-sm','title' => 'Actualizar','id'=>'actualizarValidacionSistema']) }}
            </div>
          </div>
        </div>

      <!-- /.card -->
      </div>
    {{ Form::close() }}
    </div>
  </div>
</div> 

@stop
@section('after-scripts-end')
 @include('includes.scripts.scripts_complejidad')
@stop
