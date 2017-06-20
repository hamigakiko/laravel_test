@extends('layouts.app')

@section('title', 'User Index')

@section('content')

    <div class="container">

        <div class="sub_title mb30">
            ROOM
        </div>


        <div>
            <table class="tac" border=1>
                <tr>
                @for( $i=1; $i<=$chatRooms->entry_count; $i++ )
                    <td>user&nbsp;{{$i}}</td>
                @endfor
                </tr>
                <tr>
                    @foreach( $chatRooms->userNames() as $userName )
                        <td>{{ $userName }}</td>
                    @endforeach
                </tr>
            </table>
        </div>

        <div>



        </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ action('Chat\ChatsController@store', $user->id) }}">
                <input type="text" name="message" value="">
                <input type="submit" value="submit">
            </form>

        <div>
            <a href="{{ action('Chat\ChatRoomsController@edit', $chatRooms->id) }}" class="button">退出</a>
        </div>



        <hr class="guild">

    </div>
</div>


@endsection

@section('add_js')
@endsection