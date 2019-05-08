<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/adminlte.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/input-mask/jquery.inputmask.js') }}"></script>
@yield('before-script-appjs')
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>

<script type="text/javascript">
  $(window).on('load', function(){//al momento de carga de pagina
    setTimeout(function(){
      $( ".loader-container" ).fadeOut(500, function() {
        $('.loader-container').css('display','none');
      });
    }, 500);
  });

  $(function () {//click en boton (hacen unload a la pagina)
    $('a[href*="\/"]:not([href*="#"]):not([href*="PDF"]):not([href*="XLS"]),'+
      ' button[type="submit"]:not([id="btnSubmit"]),'+
      ' input[type="submit"]:not([id="btnSubmit"])').click(function(){
      $(window).on('beforeunload', function(){
        $( ".loader-container" ).fadeIn(500, function() {
          $('.loader-container').css('display','block');
        });
      });
    });
  })

  $("body").keydown(function(e){
    if(e.which == 116){//cuando se presiona f5
      $(window).on('beforeunload', function(){
        $( ".loader-container" ).fadeIn(500, function() {
          $('.loader-container').css('display','block');
        });
      });
    }
  });

  function showLoader() { //funcion para los botones que no cumplen automaticamente las caracteristicas de las funciones anteriores
    //se les coloca onclick="showLoader()"
    $( ".loader-container" ).fadeIn(500, function() {
      $('.loader-container').css('display','block');
    });
  }

</script>

@if(notify()->ready())
  <script type="text/javascript">
      swal({
        title: "{!! notify()->message() !!}",
        text: "{!! notify()->option('text') !!}",
        icon: "{!! notify()->type() !!}",
        closeModal: true,
        @if(notify()->option('timer'))
          timer: {{ notify()->option('timer') }},
          buttons: false
        @endif
      });
  </script>
@endif

<script type="text/javascript">
// Cambiar iconos de menos y más al ocultar secciones
// Se debe corregir para cuando hay varias secciones
// @autor DP
  $(".card-tools button").click(function () {

    // El botón sobre el que se ejecuta el evento
    var boton = $(this);

    // La etiqueta padre que contiene el cuerpo de la sección
    var card = boton.closest('.card');

    // El ícono que debe ser cambiado
    var icono = boton.children();

    // Se establece un timeout para permitir que el evento termine
    // Luego del timeout se pregunta si la etiqueta padre contiene la clase collapsed-card
    // Dependiendo de la clase se cambia la clase a la que corresponde.
    setTimeout(function () {

      if (card.hasClass("collapsed-card")) {
        icono.removeClass("fa-minus");
        icono.addClass("fa-plus");
      } else {
        icono.removeClass("fa-plus");
        icono.addClass("fa-minus");
      }

    }, 500);
  })
</script>

<script>
  $('.slimScroll').slimScroll({
    height: '100%',
    color: '#ffffff',
    alwaysVisible: false
  });
</script>


<script type="text/javascript">
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>

@include('sweet::alert')

@yield('before-scripts-end')

@yield('after-scripts-end')
