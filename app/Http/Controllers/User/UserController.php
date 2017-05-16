<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

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


    public function create()
    {
        \DB::transaction(function(){
            $inputs = \Request::all();
            $user = new User();
            $user->create($inputs);
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


    public function test()
    {
        return view('user.test');
    }

}
