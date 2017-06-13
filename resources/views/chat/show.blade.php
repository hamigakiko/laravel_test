@extends('layouts.app')

@section('title', 'User Index')

@section('content')

    <div class="container">

        <div class="sub_title mb30">
            ROOM
        </div>


        <a href="{{ action('Chat\ChatRoomsController@edit', $chatRooms->id) }}" class="button">退出</a>

        <hr class="guild">

    </div>
</div>


@endsection

@section('add_js')
@endsection
