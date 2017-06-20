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


                <div class="panel-heading">その他のプロフィール</div>
                <div class="panel-body">

                    @if (isset($user))
                        <form class="form-horizontal" role="form" method="POST" action="{{ action('User\UserProfilesController@update', $user->userProfile->id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                    @else
                        <form class="form-horizontal" role="form" method="POST" action="{{ action('User\UserProfilesController@store') }}" enctype="multipart/form-data">
                    @endif
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                            <label for="birthday" class="col-md-4 control-label">誕生日</label>
                            <div class="col-md-6">
                                @if (isset($user))
                                    <input type="text" class="form-control" name="birthday" value="{{ old('birthday', @$user->userProfile->birthday) }}" autofocus>
                                @else
                                    <input type="text" class="form-control" name="birthday" value="{{ old('birthday') }}" autofocus>
                                @endif

                                @if ($errors->has('birthday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                            <label for="sex" class="col-md-4 control-label">性別</label>
                            <div class="col-md-6">

                                <select name="sex"　class="form-control">
                                    @foreach(\Config::get('const.SEX') as $v)
                                        @if (old('sex') && old('sex') === $loop->index)
                                            <option value={{$loop->index}} selected>{{$v}}aaa</option>
                                        @else
                                            @if (isset($user) && @$user->userProfile->sex === $loop->index)
                                                <option value={{$loop->index}} selected>{{$v}}</option>
                                            @else
                                                <option value={{$loop->index}}>{{$v}}</option>
                                            @endif

                                        @endif
                                    @endforeach
                                </select>


                                @if ($errors->has('sex'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
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
