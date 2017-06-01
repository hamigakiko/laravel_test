@extends('layouts.app')

@section('title', 'home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{action('User\UserController@index')}}">プロフィールへ</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
