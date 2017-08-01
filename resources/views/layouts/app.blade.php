<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Artesanal Beer') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/foundation.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive-tables.css') }}" />
    <script src="{{ asset('js/vendor/modernizr.js') }}"></script>
    <script src="{{ asset('js/responsive-tables.js') }}"></script>
    @yield('estra_css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

  </head>

  <body>
    <div id="app">
        @yield('header')
        @yield('content')
        @yield('footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('js/foundation.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script>
      $(document).foundation();
    </script>
    @yield('scripts')
  </body>

  
</html>
