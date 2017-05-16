<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <style>
            p{
                color: #666;
                width: 500px;
            }
            @yield('style')
        </style>
        <meta charset="utf-8">
        <title>MyApp - @yield('title')</title>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
