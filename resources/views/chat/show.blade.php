@extends('layouts.app')

@section('title', 'User Index')

@section('content')

    <div class="container">

        <div class="sub_title mb30">
            ROOM
        </div>


        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif


        <div>
            <table class="tac" border=1>
                <tr>
                    @for($i=1; $i<=count($chatRooms->chatRoomUsers); $i++)
                        <td>user{{ $i }}</td>
                    @endfor
                </tr>
                <tr>
                    @foreach($chatRooms->chatRoomUsers as $chatRoomUsers)
                        <td>
                            @if($chatRoomUsers->user_sex == \Config::get('const.SEX_VALUE')['women'])
                                <span class="colm">
                            @else
                                <span>
                            @endif
                            {{ $chatRoomUsers->user_name }}{{ $chatRoomUsers->user_sex }}
                            </span>
                        </td>
                    @endforeach
                </span>
            </table>
        </div>



        <div class="tac">
            <div class="mt_l">
                <p class="show_now_date"></p>
            </div>
            <div class="mt_l">
                <form class="form-horizontal" role="form" method="POST" action="{{ action('Chat\ChatsController@store') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="chat_rooms_id" value="{{ $chatRooms->id }}" >
                    <input type="text" name="message" value="{{ old('message') }}" autofocus>
                    <input type="submit" value="send">
                </form>
            </div>
        </div>

        <div class="mla">
            <span class='timer tac' data-seconds-left="10" style=""></span>(自動リロードまで)
        </div>


        <div class="mt_l">
            <table>
                <tbody>
                    <tr>
                        <th style="width:100px">name</th>
                        <th>message</th>
                        <th style="width:200px">datetime</th>
                    </tr>
                </tbody>
                <tbody id="board">
                    @foreach( $chatRooms->chatsOrderByIdDesc as $chats )
                        @if($chats->user_sex == \Config::get('const.SEX_VALUE')['women'])
                            <tr class="colm">
                        @else
                            <tr>
                        @endif
                            <td>{{ $chats->user_name }}</td></td>
                            <td>{{ $chats->message }}</td>
                            <td>{{ $chats->created_at->format('Y年m月d日 H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt_l">
            <a href="{{ action('Chat\ChatRoomsController@edit', $chatRooms->id) }}" class="button">退出</a>
        </div>

        <hr class="guild">

    </div>
</div>





@endsection

@section('add_js')
    <script src="{{ asset('js/jquery.simple.timer.js') }}"></script>
    <script>
        $(function(){

            $('.timer').startTimer({
                onComplete: function(element){
                    location.reload();
                },
            });

            setInterval(function(){
                var now = new Date();
                var y = now.getFullYear();
                var m = now.getMonth() + 1;
                var d = now.getDate();
                var w = now.getDay();
                var wd = ["日", "月", "火", "水", "木", "金", "土"];
                var h = now.getHours();
                var mi = now.getMinutes();
                var s = now.getSeconds();
                var mm = ("0" + m).slice(-2);
                var dd = ("0" + d).slice(-2);
                var hh = ("0" + h).slice(-2);
                var mmi = ("0" + mi).slice(-2);
                var ss = ("0" + s).slice(-2);
                $(".show_now_date").text(y + "年" + mm + "月" + dd + "日" + hh + "時" + mmi + "分" + ss + "秒" + "(" + wd[w] + ")");
            }, 0);
        });
    </script>
@endsection
