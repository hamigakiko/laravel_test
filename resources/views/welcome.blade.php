@extends('layouts.app')

@section('title', 'home')

@section('content')
    <div class="flex-center position-ref full-height">

        <div class="tac">
            <div class="title mb30">
                MyApp
            </div>


            @if (Auth::guest())
                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            @else
                <div class="links">
                <a href="{{ action('HomeController@index')}}">HOMEへ</a>
                </div>
            @endif


        </div>
    </div>
@endsection
