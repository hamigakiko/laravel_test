@extends('layouts.app')

@section('title', 'User Profile')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">


                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif


                <div class="panel-heading">アバター画像の設定</div>
                <div class="panel-body">

                    @if (isset($user))
                        <form class="form-horizontal" role="form" method="POST" action="{{ action('User\UserAvatersController@update', $user->id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                    @else
                        <form class="form-horizontal" role="form" method="POST" action="{{ action('User\UserAvatersController@store') }}" enctype="multipart/form-data">
                    @endif
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('avater_file') ? ' has-error' : '' }}">
                            <label for="avater" class="col-md-4 control-label">アバター画像</label>
                            <div class="col-md-6">
                                <input type="file" name="avater_file">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    設定する
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
