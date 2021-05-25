<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }} @hasSection('title') - @yield('title') @endif</title>
        <link rel="stylesheet" href="{{ url('/css/app.css') }}">
        <link rel="stylesheet" href="{{ url('/fonts/icons-1.4.0/font/bootstrap-icons.css') }}">
        @yield('styles')
        <script type="text/javascript">
          var config = { baseUrl: '{{ url('/') }}' };
        </script>
    </head>
    <body class="@yield('body-class')">
        @yield('content')
        @yield('scripts')
        <script src="{{ url('/js/app.js') }}"></script>
    </body>
</html>
