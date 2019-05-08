<script type="text/javascript">
function habilitarBoton() {
  $("#actualizar").prop("disabled", false);
}

  $( "#form-edit" ).submit(function (event) {
    event.preventDefault(event);
    swal({
      title: '¿Está seguro que quiere actualizar la complejidad de la contraseña?',
      icon: 'warning',
      buttons: ['Cancelar', "Aceptar"]
    }).then((result) => {
      if (result) {
        $("#form-edit").off("submit").submit();
      }
    });
  });
</script>
