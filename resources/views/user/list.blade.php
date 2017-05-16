@extends('layouts.master')

@section('style')
@endsection

@section('title', 'User List')

@section('content')
    <div style="margin:20px 10px; width:500px; padding:10px; height:320px; border:#ff0000 solid 1px">
        <p>new create form</p>
        <form action="/user/create" method="post" accept-charaset="utf-8">
            {!! csrf_field() !!}
            <p>name : <input type="text" name="name" value=""></p>
            <p>email: <input type="text" name="email" value=""></p>
            <p>password: <input type="text" name="password" value=""></p>
            <p>barthday: <input type="text" name="barthday" value=""></p>
            <p>age:<input type="text" name="age" value=""></p>
            <p>sex: <select name="sex">
                @foreach(\Config::get('const.SEX') as $v)
                <option value={{$loop->index}}>{{$v}}</option>
                @endforeach
            </select></p>
            <p><input type="submit" value="user create"></p>
        </form>
    </div>


    <div style="margin:20px 10px;">
        <table border=1>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>email</th>
                <th>age</th>
                <th>sex</th>
                <th>barthday</th>
                <th>remember_token</th>
            </tr>

            @foreach($records as $record)
                <tr>
                    <td><a href={{action('User\UserController@show', $record['id'])}}>{{$record['id']}}</a></td>
                    <td>{{$record['name']}}</td>
                    <td>{{$record['email']}}</td>
                    <td>{{$record['age']}}</td>
                    <td>{{ \Config::get('const.SEX')[$record['sex']] }}</td>
                    <td>{{$record['barthday']}}</td>
                    <td>{{$record['remember_token']}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection