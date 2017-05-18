@extends('layouts.master')

@section('style')
@endsection

@section('title', 'User List')

@section('content')

    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif


    <div class="form mt_m">
        <div class="tac mt_s">
            <h1 class="panel-title">Create Form</h1>
        </div>
        <form action="/user/create" method="POST" class="space_m">
            {!! csrf_field() !!}
            <dl>
                <dt>お名前<span class="label label-danger">必須</span></dt>
                <dd>
                    <input type="text" name="name" value="{{old('name')}}">
                    @if($errors->has('name'))
                        <p class="help-block">{{ $errors->first('name') }}</p>
                    @endif
                </dd>

                <dt>メールアドレス</dt>
                <dd>
                    <input type="text" name="email" value="{{old('email')}}">
                    @if($errors->has('email'))
                        <p class="help-block">{{ $errors->first('email') }}</p>
                    @endif
                </dd>

                <dt>パスワード</dt>
                <dd>
                    <input type="text" name="password" value="{{old('password')}}">
                    @if($errors->has('password'))
                        <p class="help-block">{{ $errors->first('password') }}</p>
                    @endif
                </dd>

                <dt>誕生日</dt>
                <dd>
                    <input type="text" name="barthday" value="{{old('barthday')}}">
                    @if($errors->has('barthday'))
                        <p class="help-block">{{ $errors->first('barthday') }}</p>
                    @endif
                </dd>

                <dt>年齢</dt>
                <dd>
                    <input type="text" name="age" value="{{old('name')}}">
                    @if($errors->has('age'))
                        <p class="help-block">{{ $errors->first('age') }}</p>
                    @endif
                 </dd>

                <dt>性別</dt>
                <dd>
                    <select name="sex">
                        @foreach(\Config::get('const.SEX') as $v)
                        <option value={{$loop->index}}>{{$v}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('sex'))
                        <p class="help-block">{{ $errors->first('sex') }}</p>
                    @endif
                </dd>
            </dl>
            <div class="tac mb10">
                <input type="submit" value="user create" class="button">
            </div>
        </form>
    </div>

    <div class="tac mt_l">
        <table border=1>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>登録日時</th>
                <th>更新日時</th>
            </tr>
            @foreach($records as $record)
                <tr>
                    <td><a href={{action('User\UserController@show', $record['id'])}}>{{$record['id']}}</a></td>
                    <td>{{$record['name']}}</td>
                    <td>{{$record['email']}}</td>
                    <td>{{$record['created_at']}}</td>
                    <td>{{$record['updated_at']}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection