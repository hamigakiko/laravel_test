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
        <link href="/css/parts.css?date=<?php echo_filedate("css/parts.css"); ?>" rel="stylesheet" type="text/css">


<link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link rel='stylesheet' href='/css/font-awesome.min.css' type='text/css' media='all' />
        <link rel='stylesheet' href='/css/font-awesome-animation.min.css' type='text/css' media='all' />
        <meta charset="utf-8">
        <title>MyApp - @yield('title')</title>

        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
    </head>
    <body>
        <div class="header">
            <div class="id fl">
                <ul>
                    <li class="id">
                        <a class="" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="id fr">
                <ul>
                    @if (Auth::guest())
                        <li  class="id"><a href="{{ route('login') }}">Login</a></li>
                        <li  class="id"><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        @yield('content')
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
