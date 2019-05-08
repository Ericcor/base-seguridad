@extends ('layouts.master')

@section('page-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1><i class="fa fa-lock" style="font-size: 24px !important;"></i>@if ( $user->status ==1 )  Activos @else Inactivos @endif  </h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><i class="fa fa-lock"></i>
          @if( $user->status ==1 )<a href="{{url('Seguridad/Usuarios/Activos')}}"> @else <a href="{{url('Seguridad/Usuarios/Inactivos')}}"> @endif Seguridad</a></li>
        <li class="breadcrumb-item">
          @if( $user->status ==1 ) <a href="{{url('Seguridad/Usuarios/Activos')}}"> @else <a href="{{url('Seguridad/Usuarios/Inactivos')}}"> @endif Usuarios</a></li>
        <li class="breadcrumb-item">
          @if( $user->status ==1 ) <a href="{{url('Seguridad/Usuarios/Activos')}}">Activos</a> @else <a href="{{url('Seguridad/Usuarios/Inactivos')}}">Inactivos</a> @endif
        </li>
        <li class="breadcrumb-item active">Cambiar contraseña</li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('content')
{!! Form::open(['route' => ['Seguridad.Usuarios.UpdatePassword', $user->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id'=>'form-change-password']) !!}

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header card-warning card-outline">
        <h3 class="card-title">Cambiar contraseña del usuario: <b>{{$user->name}}</b></h3>
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
            {!! Form::label('password', 'Contraseña(*)', ['class' => 'col-sm-3 col-form-label']) !!}

            <div class="col-sm-6">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('password_confirmation', 'Confirmar contraseña(*)', ['class' => 'col-sm-3 col-form-label']) !!}

            <div class="col-sm-6">
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmar Contraseña']) !!}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
            <div class="text-center">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-success btn-sm','title'=>'Actualizar']) !!}
                @if(  $user->status ==1 )
                {!! link_to_route('Seguridad.Usuarios.Activos', 'Cancelar', [], ['class' => 'btn btn-danger btn-sm','title'=>'Cancelar']) !!}
                @else
                {!! link_to_route('Seguridad.Usuarios.Inactivos', 'Cancelar', [], ['class' => 'btn btn-danger btn-sm','title'=>'Cancelar']) !!}
                @endif
            </div>
            </div>
        </div>

        <div class="clearfix"></div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>

{{-- fin de la vista --}}
@stop

@section('after-scripts-end')
@include('includes.scripts.usuarios')
@endsection
