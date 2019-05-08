<script type="text/javascript">
var Eliminar = function(id){
 swal({
  title: '¿Está seguro de eliminar el rol del sistema?',
  text: "El mismo no podrá recuperarse!",
  icon: 'warning',
  buttons: ['Cancelar', "Aceptar"]
}).then((result) => {

  if (result) {
      var route = "{{url('Seguridad/RolesRegistrados/Borrar')}}/"+id+"";
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
            var url='{{ url('Seguridad/RolesRegistrados')}}';
            location.href = url;
            //Alerta de Confirmación
            swal({
              title: 'Rol eliminado satisfactoriamente',
              text: "",
              icon: 'success'
            });
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

$( "#create-role" ).submit(function (event) {
  event.preventDefault(event);
  swal({
    title: '¿Está seguro de que quiere crear este rol?',
    icon: 'warning',
    buttons: ['Cancelar', "Aceptar"]
  }).then((result) => {
    if (result) {
      $("#create-role").off("submit").submit();
    }
  });
});

$( "#edit-role" ).submit(function (event) {
  event.preventDefault(event);
  swal({
    title: '¿Está seguro de que quiere actualizar este rol?',
    icon: 'warning',
    buttons: ['Cancelar', "Aceptar"]
  }).then((result) => {
    if (result) {
      $("#edit-role").off("submit").submit();
    }
  });
});
</script>
