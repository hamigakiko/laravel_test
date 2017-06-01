@extends('layouts.app')

@section('title', 'User Index')

@section('content')






    <div class="container">

        <div class="sub_title mb30">
            プロフィール
        </div>

        <dl>
            <dt>ID</dt>
            <dd>{{$user->id}}</dd>

            <dt>メールアドレス</dt>
            <dd>{{$user->email}}</dd>

            <dt>パスワード</dt>
            <dd>{{$user->password}}</dd>

            <dt>名前</dt>
            <dd>{{$user->name}}</dd>

            <dt>remember_token</dt>
            <dd>{{$user->remember_token}}</dd>

            <dt>登録日時</dt>
            <dd>{{$user->created_at}}</dd>
        </dl>


        @if ($user->userProfile !== null)
        <dl>
            <dt>誕生日</dt>
            <dd>{{$user->userProfile->birthday}}</dd>
            <dt>性別</dt>
            <dd>{{$user->userProfile->sex}}</dd>
        </dl>
        @endif


            @if ($user->userProfile !== null)
                <a href="{{action('User\UserProfilesController@edit', $user->id)}}" class="button">その他のプロフィールを再設定する</a>
            @else
                <a href="{{action('User\UserProfilesController@create')}}" class="button">その他のプロフィールを設定する</a>
            @endif

        <hr class="guild">
</div>


@endsection
