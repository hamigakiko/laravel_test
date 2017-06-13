<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\ChatRooms;
use App\Models\ChatRoomUsers;
use App\Http\Controllers\Controller;

use DB;

class ChatRoomsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $chatRoomsList = ChatRooms::all();

        $template_params = [
            "user"          => $user,
            "chatRoomsList" => $chatRoomsList,
        ];


        return view('chat.index', $template_params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();

        $chatRooms = ChatRooms::find($id);

        $chatRoomUsers = new ChatRoomUsers();
        $datas = [
            'chat_rooms_id' => $chatRooms->id,
            'user_id'       => $user->id,
        ];
        $chatRoomUsers->fill($datas);

        DB::transaction(function () use($user, $chatRooms, $chatRoomUsers) {
            if(!$chatRooms->existsChatRoom($user->id)){
                $chatRoomUsers->save();

                if($chatRooms->checkClosed(true)){
                    $chatRooms->save();
                }
            }
        });


        $template_params = [
            'chatRooms' => $chatRooms,
        ];
        return view('chat.show', $template_params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();

        $chatRooms = ChatRooms::find($id);

        DB::transaction(function () use($user, $chatRooms) {
            ChatRoomUsers::where('chat_rooms_id', $chatRooms->id)->where('user_id', $user->id)->delete();
            if( $chatRooms->checkClosed() ){
                $chatRooms->is_closed = false;
                $chatRooms->save();
            }
        });


        return redirect()->action('Chat\ChatRoomsController@index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
