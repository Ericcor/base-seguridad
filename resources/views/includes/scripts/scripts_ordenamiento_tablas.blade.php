<script type="text/javascript">
  // Almacena los encabezados ordenables
  var ordenables = $(".ordenable");

  // Obtiene la columna por la que se está ordenando actualmente la consulta
  var columna = "{{ $order_by->columna ?? '' }}";

  // Obtiene el orden actual de la consulta
  var orden = "{{ strtolower($order_by->orden ?? 'asc') }}";

  // Obtiene la url actual
  var url = "{{ url()->current() }}";

  // Obtiene las variables GET en caso de que se estén realizando filtros
  var query_string = "{!! http_build_query(request()->except('page', 'order_by')) !!}";

  ordenables.each(function () {

    // Se le agrega la propiedad nowrap a todos los encabezados para mantener el título y los íconos en la misma linea
    $(this).attr("nowrap","nowrap");

    // Asigna el ícono que le corresponde según la columna y el orden
    if ($(this).data('columna') != columna) {
      $(this).append(' <i class="fa fa-long-arrow-down"></i><i class="fa fa-long-arrow-up"></i>')
    } else {
      if (orden == 'asc') {
        $(this).append(' <i class="fa fa-sort-amount-asc"></i>')
      } else {
        $(this).append(' <i class="fa fa-sort-amount-desc"></i>')
      }
    }
  });

  // Envía la columna y el orden que corresponde para reordenar la tabla
  ordenables.click(function () {
    var nuevo_orden;
    if ($(this).data('columna') == columna) {
      nuevo_orden = orden == 'asc' ? 'desc' : 'asc';
    } else {
      nuevo_orden = 'asc';
    }

    var order_by = 'order_by=' + $(this).data('columna') + '-' + nuevo_orden;
    var full_url = url + '?' + order_by;
    var full_url = query_string ? full_url + '&' + query_string : full_url;
    $(location).attr('href', decodeURIComponent(full_url));

  });
</script>
