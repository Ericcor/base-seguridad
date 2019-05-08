@extends ('layouts.master')

@section('page-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-5">
      <h1><i class="fa fa-user"></i> Mi perfil</h1>
    </div>
    <div class="col-sm-7">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('PerfilUsuario/MiPerfil')}}"><i class="fa fa-user"></i> Perfil de usuarios</a></li>
        <li class="breadcrumb-item"><a href="{{url('PerfilUsuario/MiPerfil')}}"> Mi perfil</a></li>
        <li class="breadcrumb-item active">Cambiar contraseña</li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('content')
{!! Form::open(['route' => ['PerfilUsuario.updatePasword', $user->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id'=>'form-change-password']) !!}
<div class="row">
    <div class="col-md-12">
      <!-- Line chart -->
      <div class="card card-warning card-outline">
        <div class="card-header">
          <h3 class="card-title">Cambiar contraseña del usuario : <b>{{$user->name}}</b></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">

          <div class="form-group row">
            <div class="col-md-7 offset-md-2">
              @include('includes.messages')
            </div>
          </div>

          <div class="callout col-sm-8 offset-sm-2" style="color: #737373;">
            <h4 style="font-size: 14px;"><i class="fa fa-info-circle" style="color: #ff0000;"></i> Nota:</h4>
            <li>Los campos marcados con un asterisco (*) son obligatorios.</li>
          </div><br>

          <div class="row col-md-12 form-horizontal text-center">

            <div class="form-group row col-md-12">
              {!! Form::label('old_password', 'Contraseña actual(*)', ['class' => 'col-lg-3 col-form-label']) !!}
              <div class="col-md-6">
                {!! Form::password('old_password', ['class' => 'form-control', 'placeholder' => 'Contraseña anterior']) !!}
              </div>
            </div>

            <div class="form-group row col-md-12">
              {!! Form::label('password', 'Nueva contraseña(*)', ['class' => 'col-lg-3 col-form-label']) !!}
              <div class="col-md-6">
               {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
              </div>
            </div>

            <div class="form-group row col-md-12">
              {!! Form::label('password_confirmation', 'Confirmar contraseña(*)', ['class' => 'col-lg-3 col-form-label']) !!}
              <div class="col-md-6">
                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmar contraseña']) !!}
              </div>
            </div>

            <div class="col-md-12 text-center"><br>
              {!! Form::submit('Actualizar', ['class' => 'btn btn-success btn-sm','title'=>'Actualizar']) !!}
              {!! link_to_route('PerfilUsuario.index', 'Cancelar', [], ['class' => 'btn btn-danger btn-sm','title'=>'Cancelar']) !!}
            </div>

          </div>
        </div>
        {{ Form::close() }}
      </div>
      <!-- /.card -->
    </div>
</div>
{{-- fin de la vista --}}
@stop

@section('after-scripts-end')
    {!! Html::script('js/backend/access/users/script.js') !!}
@stop
