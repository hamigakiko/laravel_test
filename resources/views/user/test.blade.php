@extends('layouts.master')

@section('style')
    @parent
    p{
        color: #F1F;
        width: 500px;
    }
@endsection

@section('title', 'Page Title')


@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection


@section('content')
    <p>This is my body content</p>
@endsection