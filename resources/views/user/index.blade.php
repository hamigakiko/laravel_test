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


        <div class="subsub_title">
            詳細データ
        </div>
        <dl>
            <dt>アバター画像</dt>
            <dd>
              @if($user->userAvater)
                <a href="{{ asset("images/avaters/".$user->userAvater->name) }}" data-lightbox="image-1" data-title="アバター" alt="avater">
                    <img src="{{ asset("images/avaters/mini/".$user->userAvater->name) }}" alt="avater_mini">
                </a>
              @endif
            </dd>
            <dt>誕生日</dt>
            <dd>{{@$user->userProfile->birthday}}</dd>
            <dt>性別</dt>
            <dd>{{@Config::get('const.SEX')[$user->userProfile->sex]}}</dd>
        </dl>

        <div class="mt_m">
            @if ($user->userProfile !== null)
                <a href="{{action('User\UserProfilesController@edit', $user->id)}}" class="button">詳細データを再設定する</a>
            @else
                <a href="{{action('User\UserProfilesController@create')}}" class="button">詳細データを設定する</a>
            @endif
        </div>

        <div class="mt_m">
            @if ($user->userAvater !== null)
                <a href="{{action('User\UserAvatersController@edit', $user->id)}}" class="button">アバター画像を再設定する</a>
            @else
                <a href="{{action('User\UserAvatersController@create')}}" class="button">アバター画像を設定する</a>
            @endif
        </div>

        <hr class="guild">
</div>


@endsection

@section('add_js')
    <script src="{{ asset('js/lightbox.js') }}"></script>
@endsection
