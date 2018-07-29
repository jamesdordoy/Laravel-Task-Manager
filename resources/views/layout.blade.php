<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="/favicon.ico" rel="icon" type="image/x-icon" />
        <title>Task Manager</title>

        <!-- Styles -->
        
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body>
    
        @include("partials.header")
        <div id="app" class="container">
            @yield('content')
    
        </div>
       
        
        @yield('templates')
    
        @yield('scripts')
        
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
