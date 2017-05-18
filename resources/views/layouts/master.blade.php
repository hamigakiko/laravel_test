@php
    function echo_filedate($filename) {
        if (file_exists($filename)) {
            echo date('YmdHis', filemtime($filename));
        } else {
            echo 'file not found';
        }
    }
@endphp

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta http-equiv="Content-Style-Type" content="text/css; charset=utf-8" />
        <link href="/css/styles.css?date=<?php echo_filedate("css/styles.css"); ?>" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
        <title>MyApp - @yield('title')</title>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
