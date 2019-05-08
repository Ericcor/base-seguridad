<script type="text/javascript">

var Eliminar = function(id){
 swal({
  title: '¿Está seguro de eliminar el usuario del sistema?',
  text: "El mismo no podrá iniciar sesión en el sistema nuevamente!",
  icon: 'warning',
  buttons: ['Cancelar', "Aceptar"]
}).then((result) => {

  if (result) {
      var route = "{{url('Seguridad/Usuarios/Borrar')}}/"+id+"";
      console.log(route);
      var token = $("#token").val();
      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          if (data.success == 'true')
          {
            //Alerta de Confirmación
            swal({
              title: 'Usuario eliminado satisfactoriamente',
              text: "",
              icon: 'success'
            });
            var url='{{ url('Seguridad/Usuarios/Activos')}}';
            setTimeout(function(){
              location.href = url;
              //location.reload(true);
            },500)
          }
        },
        error:function(data)
        {
          switch (data.status) {
            case 400:
            $("#message-error-delete").show().html("Servidor ha entendido la solicitud, pero el contenido de solicitud no es válida.");
            break;
            case 422:
            var errors = '<ul>';
            for (datos in data.responseJSON)
            {
              errors += '<li>' +data.responseJSON[datos] + '</li>';
            }
            errors += '</ul>';
            $("#message-error-delete").show().html(errors);
            break;
            case 401:
            $("#message-error-delete").show().html("Acceso no autorizado.");
            break;
            case 403:
            $("#message-error-delete").show().html("Prohibido recurso no se puede acceder.");
            break;
            case 405:
            $("#message-error-delete").show().html("Ha ocurrido un error en la aplicación.");
            break;
            case 500:
            $("#message-error-delete").show().html("Error Interno del Servidor.");
            break;
            case 503:
            $("#message-error-delete").show().html("Servicio no disponible.");
            break;
          }
        }
      });
    }
  });
};

var Desactivar = function(id){
 swal({
  title: '¿Está seguro que desea desactivar el usuario?',
  text: " La cuenta del usaurio será desactivada y no podrá iniciar sesión!",
  icon: 'warning',
  buttons: ['cancelar', "Aceptar"]
}).then((result) => {
  if (result) {
      var route = "{{url('Seguridad/Usuarios/Desactivar')}}/"+id+"";
      console.log(route);
      var token = $("#token").val();
      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          if (data.success == 'true')
          {
            //Alerta de Confirmación
            swal({
              title: 'Usuario desactivado satisfactoriamente',
              text: "",
              icon: 'success'
            });
            var url='{{ url('Seguridad/Usuarios/Activos')}}';
            setTimeout(function(){
              location.href = url;
              //location.reload(true);
            },500)
          }
        },
        error:function(data)
        {
          switch (data.status) {
            case 400:
            $("#message-error-delete").show().html("Servidor ha entendido la solicitud, pero el contenido de solicitud no es válida.");
            break;
            case 422:
            var errors = '<ul>';
            for (datos in data.responseJSON)
            {
              errors += '<li>' +data.responseJSON[datos] + '</li>';
            }
            errors += '</ul>';
            $("#message-error-delete").show().html(errors);
            break;
            case 401:
            $("#message-error-delete").show().html("Acceso no autorizado.");
            break;
            case 403:
            $("#message-error-delete").show().html("Prohibido recurso no se puede acceder.");
            break;
            case 405:
            $("#message-error-delete").show().html("Ha ocurrido un error en la aplicación.");
            break;
            case 500:
            $("#message-error-delete").show().html("Error Interno del Servidor.");
            break;
            case 503:
            $("#message-error-delete").show().html("Servicio no disponible.");
            break;
          }
        }
      });
    }
  });
};


//usuarios alertas crear editar y change pass
  $( "#form-create" ).submit(function (event) {
    event.preventDefault(event);
    swal({
      title: '¿Está seguro de que quiere crear el usuario?',
      icon: 'warning',
      buttons: ['Cancelar', "Aceptar"]
    }).then((result) => {
      if (result) {
        $("#form-create").off("submit").submit();
      }
    });
  });

  $( "#form-edit" ).submit(function (event) {
    event.preventDefault(event);
    swal({
      title: '¿Está seguro de que quiere actualizar el usuario?',
      icon: 'warning',
      buttons: ['Cancelar', "Aceptar"]
    }).then((result) => {
      if (result) {
        $("#form-edit").off("submit").submit();
      }
    });
  });

  $( "#form-change-password" ).submit(function (event) {
    event.preventDefault(event);
    swal({
      title: '¿Está seguro de que quiere cambiar la contraseña del usuario?',
      icon: 'warning',
      buttons: ['Cancelar', "Aceptar"]
    }).then((result) => {
      if (result) {
        $("#form-change-password").off("submit").submit();
      }
    });
  });

var Restaurar = function(id){
 swal({
  title: '¿Está seguro de restaurar el usuario ?',
  //text: "El mismo podrá iniciar sesión en el sistema nuevamente!",
  icon: 'warning',
  buttons: ['Cancelar', "Aceptar"]
}).then((result) => {

  if (result) {
      var route = "{{url('Seguridad/Usuarios/Restaurar')}}/"+id+"";
      console.log(route);
      var token = $("#token").val();
      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          if (data.success == 'true')
          {
            //Alerta de Confirmación
            swal({
              title: 'Usuario restaurado satisfactoriamente',
              text: "",
              icon: 'success'
            });
            var url='{{ url('Seguridad/Usuarios/Activos')}}';
            setTimeout(function(){
              location.href = url;
              //location.reload(true);
            },500)
          }
        },
        error:function(data)
        {
          switch (data.status) {
            case 400:
            $("#message-error-delete").show().html("Servidor ha entendido la solicitud, pero el contenido de solicitud no es válida.");
            break;
            case 422:
            var errors = '<ul>';
            for (datos in data.responseJSON)
            {
              errors += '<li>' +data.responseJSON[datos] + '</li>';
            }
            errors += '</ul>';
            $("#message-error-delete").show().html(errors);
            break;
            case 401:
            $("#message-error-delete").show().html("Acceso no autorizado.");
            break;
            case 403:
            $("#message-error-delete").show().html("Prohibido recurso no se puede acceder.");
            break;
            case 405:
            $("#message-error-delete").show().html("Ha ocurrido un error en la aplicación.");
            break;
            case 500:
            $("#message-error-delete").show().html("Error Interno del Servidor.");
            break;
            case 503:
            $("#message-error-delete").show().html("Servicio no disponible.");
            break;
          }
        }
      });
    }
  });
};


var Activar = function(id){
  swal({
    title: '¿Está seguro de activar el usuario?',
    //text: "El mismo podrá iniciar sesión en el sistema nuevamente!",
    icon: 'warning',
    buttons: ['Cancelar', "Aceptar"]
  }).then((result) => {

    if (result) {
      var route = "{{url('Seguridad/Usuarios/Activate')}}/"+id+"";
      console.log(route);
      var token = $("#token").val();
      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          if (data.success == 'true')
          {
            //Alerta de Confirmación
            swal({
              title: 'Usuario activado satisfactoriamente',
              text: "",
              icon: 'success'
            });
            var url='{{ url('Seguridad/Usuarios/Activos')}}';
            setTimeout(function(){
              location.href = url;
              //location.reload(true);
            },500)
          }
        },
        error:function(data)
        {
          switch (data.status) {
            case 400:
            $("#message-error-delete").show().html("Servidor ha entendido la solicitud, pero el contenido de solicitud no es válida.");
            break;
            case 422:
            var errors = '<ul>';
            for (datos in data.responseJSON)
            {
              errors += '<li>' +data.responseJSON[datos] + '</li>';
            }
            errors += '</ul>';
            $("#message-error-delete").show().html(errors);
            break;
            case 401:
            $("#message-error-delete").show().html("Acceso no autorizado.");
            break;
            case 403:
            $("#message-error-delete").show().html("Prohibido recurso no se puede acceder.");
            break;
            case 405:
            $("#message-error-delete").show().html("Ha ocurrido un error en la aplicación.");
            break;
            case 500:
            $("#message-error-delete").show().html("Error Interno del Servidor.");
            break;
            case 503:
            $("#message-error-delete").show().html("Servicio no disponible.");
            break;
          }
        }
      });
    }
  });
};
</script>
