@extends('layouts.app')

@section('title', 'User Index')

@section('content')

    <div class="container">

        <div class="sub_title mb30">
            ROOMS
        </div>


        <div class="mb30">
            <p class="show_now_date"></p>
        </div>


        @foreach($chatRoomsList as $chatRooms)
            <p>
                @if ($chatRooms->checkClosed() && !$chatRooms->isChatRoomMembers($user->id))
                    {{ $chatRooms->name }} {{ count($chatRooms->chatRoomUsers) }} / {{ $chatRooms->entry_count }}
                    <span class="colm">《満室》</span>
                @else
                    {{ $chatRooms->name }} {{ count($chatRooms->chatRoomUsers) }} / {{ $chatRooms->entry_count }}
                    <a href="{{ action('Chat\ChatRoomsController@show', $chatRooms->id) }}" class="button">
                        @if ( $chatRooms->isChatRoomMembers($user->id) )
                            <span class="colp">入室中</span>
                        @else
                            <span class="colb">入室する</span>
                        @endif
                    </a>
                @endif
            </p>
        @endforeach

        <hr class="guild">

    </div>
</div>


@endsection


@section('add_js')




@endsection
