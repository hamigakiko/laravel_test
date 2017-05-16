@extends('layouts.master')

@section('style')
@endsection

@section('title', 'User Profile')

@section('content')
    <table border=1>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>email</th>
            <th>remember_token</th>
        </tr>

        <tr>
            <td>{{ $record['id'] }}</td>
            <td>{{ $record['name'] }}</td>
            <td>{{ $record['email'] }}</td>
            <td>{{ $record['remember_token'] }}</td>
        </tr>
    </table>
@endsection