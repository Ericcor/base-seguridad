<html>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Seguridad base</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Token laravel -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  {!! Html::script('js/sweetalert.min.js') !!}

  <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/adminlte.min.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.googleapis.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/loader.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/epsach.css') }}">

  @yield('before-styles-end')

  @yield('after-styles-end')

</head>
