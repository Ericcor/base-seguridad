@extends('layouts.login')

@section('content')
<div class="login-box">
  <div id="card">
    <div class="card-body login-card-body">
      <div class="col-sm-12 text-center">
        <!--<img style="width: 80%; height: auto;" src="{{asset('/img/')}}" class="register-logo-eps"/>-->
      </div>
    <br>
      <div class="col-sm-12">
        @include('includes.messages')
      </div>
      <div class="login-box-body bg-dark">
        <p class="login-box-msg">Sesión</p>
        {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="input-group input-group-login mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="email" autocomplete="off">
          <div class="input-group-append input-group-append-login">
            <span class="fa fa-user input-group-text input-group-text-login"></span>
          </div>
        </div>
        <div class="input-group input-group-login mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="password">
          <div class="input-group-append input-group-append-login">
            <span class="fa fa-lock input-group-text input-group-text-login"></span>
          </div>
        </div>
        <div class="input-group input-group-login mb-3">
            <button type="submit" class="btn btn-danger btn-block btn-flat">Acceder</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div><!-- login-card-body -->
  </div><!-- /.login-box -->
</div>
@endsection
