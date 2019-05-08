@extends ('layouts.master')
@section('page-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1><i class="fa fa-lock" style="font-size: 24px !important;"></i>@if ( $user->status ==1 )  Activos @else  Inactivos @endif  </h1>
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
        <li class="breadcrumb-item active">Editar</li>
      </ol>
    </div>
  </div>
</div>
@endsection

@section('content')
{!! Form::model($user, ['route' => ['Seguridad.Usuarios.update', $user], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id'=>'form-edit']) !!}

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header card-warning card-outline">
        <h3 class="card-title">Editar</h3>
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
          </div><!--col-sm-10-->
        </div><!--form control-->

        <div class="form-group row">
          {!! Form::label('email', 'Usuario(*)', ['class' => 'col-sm-3 col-form-label']) !!}

          <div class="col-sm-6">
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Correo electrónico. (example@example.com)']) !!}
          </div><!--col-sm-10-->
        </div><!--form control-->

        @if ($user->id != 1)
        <div class="form-group row">
          {!! Form::label('status', 'Activo', ['class' => 'col-sm-3 col-form-label']) !!}

          <div class="col-sm-1">
            {!! Form::checkbox('status', '1', $user->status == 1) !!}
          </div><!--col-sm-1-->
        </div><!--form control-->

        <input type="hidden" name="confirmed" value="1">

        <div class="form-group row">
          {!! Form::label('status', 'Roles asociados(*)', ['class' => 'col-sm-3 col-form-label']) !!}
          <div class="col-sm-6">
            @if (count($roles) > 0)
              @foreach($roles as $role)
                <div class="col-sm-12">
                  <input class="form-check-input col-form-label" type="checkbox" value="{{$role->id}}" name="assignees_roles[]" {{in_array($role->id, $user_roles) ? 'checked' : ''}} id="role-{{$role->id}}" />
                  <label class="form-check-label col-sm-9" for="role-{{$role->id}}">{{ $role->name }}</label>
                  <a href="#" data-role="role_{{$role->id}}" class="show-permissions small">
                    (<span class="show-text"> Mostrar</span>
                    <span class="hide-text hidden">Ocultar</span> Permisos )
                  </a>
                </div><br>
                <div class="permission-list hidden " data-role="role_{{$role->id}}">
                  @if ($role->todos)
                  <p style="margin-left: 3%;">Todos los Permisos asignados.</p><br/><br/>
                  @else
                    @if (count($role->permissions) > 0)
                      <blockquote style="margin-left: 3%;">
                        <p>
                          @foreach ($role->permissions as $perm)
                            {{$perm->display_name}}<br/>
                          @endforeach
                        </p>
                      </blockquote>
                    @else
                      <p style="margin-left: 3%;">Sin Permisos asignados.</p><br/><br/>
                    @endif
                  @endif
                </div>
              @endforeach
            @else
              No hay Roles disponibles.
            @endif
          </div>
        </div>
        @endif

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
  </div>
</div>

@if ($user->id == 1)
{!! Form::hidden('status', 1) !!}
{!! Form::hidden('confirmed', 1) !!}
{!! Form::hidden('assignees_roles[]', 1) !!}
@endif

{!! Form::close() !!}
{{-- fin vista --}}
@stop

@section('after-scripts-end')
<style type="text/css">
  .hidden {
  display: none !important; }
</style>
@include('includes.scripts.usuarios')
@endsection
