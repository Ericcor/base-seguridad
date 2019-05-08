<script type="text/javascript">
 $('#associated-permissions').change(function () {
  if ($('#associated-permissions').val() == 'all') {
    $('#available-permissions').addClass('hide');
  } else {
    $('#available-permissions').removeClass('hide');
  }
 })
</script>
