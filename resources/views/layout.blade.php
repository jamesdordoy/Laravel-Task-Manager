<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Task Manager</title>

        <!-- Styles -->
        
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/theme.css">
    </head>
    <body>
    
        @include("partials.header")
        
        @yield('content')
        
        @yield('templates')
    
        @yield('scripts')
        <script src="/js/app.js"></script>
    </body>
</html>
