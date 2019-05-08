<!doctype html>
  @section('htmlheader')
      @include('includes.htmlheader')
  @show

<body class="hold-transition">

  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="col-sm-12">

      <!-- Main content -->
      <section class="content">
          <div id="app"></div>
        @yield('content')
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  </div><!-- ./wrapper -->

  @section('scripts')
      @include('includes.scripts')
  @show
</body>
</html>
