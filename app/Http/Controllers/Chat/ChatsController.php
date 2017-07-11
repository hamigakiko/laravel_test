<?php

namespace App\Http\Controllers\Chat;


use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\Chats\ChatsStoreFormRequest;


use App\Models\ChatRooms;
use App\Models\ChatRoomUsers;
use App\Models\Chats;
use App\Http\Controllers\Controller;

use DB;


class ChatsController extends Controller
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
        // $user = Auth::user();

        // return $user->name;

        // return Response::json($user);
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
    public function store(ChatsStoreFormRequest $request)
    {
        $user = Auth::user();

        $chatRooms = ChatRooms::find($request->chat_rooms_id);

        if(!$chatRooms->isChatRoomMembers($user->id)){
            abort(400, 'ルームにユーザーが存在しません。');
        }

        $chatParams = [
            'chat_rooms_id' => $request->chat_rooms_id,
            'user_id'       => $user->id,
            'user_name'     => $user->name,
            'user_sex'      => $user->userProfile->sex,
            'message'       => $request->message,
        ];
        $chats = new Chats;
        $chats->fill($chatParams);
        $chats->save();

        return redirect()->action('Chat\ChatRoomsController@show', $request->chat_rooms_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
