<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
            "user" => $user,
        ];
        return view('user.index', $template_params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserProfilesStoreFormRequest $request)
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






























//     public function show(int $id)
//     {
//         $user = Auth::user();



//         // $user_profile = $user->userProfile();


// // logger($user->userProfile->age);

//         $template_params = [
//             "user" => $user,
//         ];
//         return view('user.profile', $template_params);
//     }


//     public function create(CreateUserRequest $request)
//     {
//         $user = new User($request->all());
//         \DB::transaction(function() use($user) {
//             $user->create();
//         });

//         return redirect('user/list');
//     }


//     public function list()
//     {
//         $records = User::all();
//         return view('user.list')->with([
//             "records" => $records
//         ]);
//     }



















}
