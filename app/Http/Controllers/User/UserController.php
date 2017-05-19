<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{


    public function show(int $id)
    {
        $record = User::findOrFail($id);

        return view('user.profile')->with([
            "record" => $record
        ]);
    }


    public function create(CreateUserRequest $request)
    {
        $user = new User($request->all());
        \DB::transaction(function() use($user) {
            $user->create();
        });

        return redirect('user/list');
    }


    public function list()
    {
        $records = User::all();
        return view('user.list')->with([
            "records" => $records
        ]);
    }


}
