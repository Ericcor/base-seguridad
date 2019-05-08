@extends ('layouts.master')
@section('page-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1><i class="fa fa-lock" style="font-size: 24px !important;"></i> Activos </h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('Seguridad/Usuarios/Activos')}}"><i class="fa fa-lock"></i> Seguridad</a></li>
        <li class="breadcrumb-item"><a href="{{url('Seguridad/Usuarios/Activos')}}">Usuarios</a></li>
        <li class="breadcrumb-item"><a href="{{url('Seguridad/Usuarios/Activos')}}">Activos</a></li>
        <li class="breadcrumb-item active">Crear </li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('content')
{!! Form::open(['route' => 'Seguridad.Usuarios.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post','id'=>'form-create']) !!}
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header card-warning card-outline">
        <h3 class="card-title">Crear</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">

        <div class="form-group row">
          <div class="col-sm-6 offset-sm-3">
            @include('includes.messages')
          </div>
        </div>

        <div class="callout col-sm-8 offset-sm-2" style="color: #737373;">
          <h4 style="font-size: 14px;"><i class="fa fa-info-circle" style="color: #ff0000;"></i> Nota:</h4>
          <span>Los campos marcados con un asterisco (*) son obligatorios.</span>
        </div><br>

        <div class="form-group row">

          {!! Form::label('name', 'Nombre(*)', ['class' => 'col-sm-3 col-form-label']) !!}

          <div class="col-sm-6">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
          </div>
        </div>

        <div class="form-group row">
          {!! Form::label('email', 'Usuario(*)', ['class' => 'col-sm-3 col-form-label']) !!}

          <div class="col-sm-6">
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Correo electrónico. (example@example.com)']) !!}
          </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group row">
          {!! Form::label('password', 'Contraseña(*)', ['class' => 'col-sm-3 col-form-label']) !!}

          <div class="col-sm-6">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
          </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group row">
          {!! Form::label('password_confirmation','Confirmación de contraseña(*)', ['class' => 'col-sm-3 col-form-label']) !!}

          <div class="col-sm-6">
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmación de Contraseña']) !!}
          </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group row">
          {!! Form::label('status','Activo', ['class' => 'col-sm-3 col-form-label']) !!}

          <div class="col-sm-6">
            {!! Form::checkbox('status', '1', true) !!}
          </div><!--col-lg-1-->
        </div><!--form control-->


        <input type="hidden" name="confirmed" value="1">


        <div class="form-group row">
          {!! Form::label('status', 'Roles asociados(*)', ['class' => 'col-sm-3 col-form-label']) !!}
          <div class="col-sm-6">
              @foreach($roles as $role)
                <div class="col-sm-12">
                  <input class="form-check-input col-form-label" type="checkbox" value="{{$role->id}}" name="assignees_roles[]" id="role-{{$role->id}}" />
                  <label class="form-check-label col-sm-9" for="role-{{$role->id}}">{{ $role->name }}</label>
                </div>
              @endforeach
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <div class="text-center">
              {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-sm','title'=>'Guardar']) !!}
              {!! link_to_route('Seguridad.Usuarios.Activos', 'Cancelar', [], ['class' => 'btn btn-danger btn-sm','title'=>'Cancelar']) !!}
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
  {!! Form::close() !!}
  @stop

@section('after-scripts-end')
<style type="text/css">
  .hidden {
  display: none !important; }
</style>
@include('includes.scripts.usuarios')
@endsection
