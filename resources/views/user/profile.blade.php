@extends('layouts.master')

@section('style')
@endsection

@section('title', 'User Profile')

@section('content')

    <dl>
        <dt>ID</dt>
        <dd>{{$record['id']}}</dd>

        <dt>メールアドレス</dt>
        <dd>{{$record['email']}}</dd>

        <dt>パスワード</dt>
        <dd>{{$record['password']}}</dd>

        <dt>名前</dt>
        <dd>{{$record['name']}}</dd>

        <dt>誕生日</dt>
        <dd>{{$record['barthday']}}</dd>

        <dt>年齢</dt>
        <dd>{{$record['age']}}</dd>

        <dt>性別</dt>
        <dd>{{\Config::get('const.SEX')[$record['sex']]}}</dd>

        <dt>remember_token</dt>
        <dd>{{$record['remember_token']}}</dd>

        <dt>登録日時</dt>
        <dd>{{$record['created_at']}}</dd>
    </dl>

    <div class="mt_m">
        <a href={{action('User\UserController@list')}} class="button">一覧へ</a>
    </div>
@endsection