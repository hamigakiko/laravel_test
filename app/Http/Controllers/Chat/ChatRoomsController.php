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

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $template_params = [
            "user"          => $user,
            "chatRoomsList" => ChatRooms::all(),
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

        DB::transaction(function () use($user, $chatRooms) {
            $chatRoomUsers = ChatRoomUsers::firstOrNew(['chat_rooms_id'=>$chatRooms->id, 'user_id'=>$user->id]);
            $chatRoomUsers->fill(['user_name'=>$user->name]);
            $chatRoomUsers->save();

            if(!$chatRooms->is_closed && $chatRooms->checkClosed()){
                $chatRooms->is_closed = true;
                $chatRooms->save();
            }
        });

        $template_params = [
            'chatRooms' => $chatRooms,
            'user'      => $user,
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
            if( $chatRooms->is_closed && !$chatRooms->checkClosed() ){
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
