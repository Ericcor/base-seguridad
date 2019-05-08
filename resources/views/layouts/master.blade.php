<!doctype html>
  @section('htmlheader')
      @include('includes.htmlheader')
  @show

<body class="hold-transition sidebar-mini @guest sidebar-collapse @endguest">

  <div class="wrapper">
    @include('includes.header')
    @include('includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper fixed_wrapper">

      <!-- loader -->
      <div class="loader-container">
        <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
      </div>

      <!-- Content Header (Page header) -->
      <section class="content-header">
        @yield('page-header')
      </section>

      <!-- Main content -->
      <section class="content">
        <div id="app">
        @yield('content')
        </div>
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->

    @include('includes.footer')
  </div><!-- ./wrapper -->

  @section('scripts')
      @include('includes.scripts')
  @show
</body>
</html>
