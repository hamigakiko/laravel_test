<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\UserProfilesStoreFormRequest;
use App\Http\Requests\UserProfilesUpdateFormRequest;


use Illuminate\Support\Facades\Auth;

use App\UserProfile;
use App\Http\Controllers\Controller;


use DB;

class UserProfilesController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('user.profile_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserProfilesStoreFormRequest $request)
    {
        $user = Auth::user();

        $user->userProfile = new UserProfile();
        $user->userProfile->fill($request->all());
        $user->userProfile->user_id = $user->id;
        $user->userProfile->save();

        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $template_params = [
            "user" => $user,
        ];
        return view('user.profile', $template_params);
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

        $template_params = [
            "user" => $user,
        ];
        return view('user.profile_form', $template_params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserProfilesUpdateFormRequest $request, $id)
    {
        $user = Auth::user();
        $user->userProfile->fill($request->all());
        $user->userProfile->save();

        return redirect('user');
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
