<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\UserAvatersStoreFormRequest;
use App\Http\Requests\UserAvatersUpdateFormRequest;


use Illuminate\Support\Facades\Auth;

use App\UserAvater;
use App\Http\Controllers\Controller;

// use Input;
use Image;

use DB;

use Illuminate\Http\UploadedFile;

class UserAvatersController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.avater_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAvatersStoreFormRequest $request)
    {
        $user = Auth::user();
        $userAvater = new userAvater();

        $file = $request->file('avater_file');
        $fileExtension = $file->extension();
        $fileName = $user->id . '.' . $fileExtension;
        $filePath = public_path()  . '/images/avaters/';

        $image = Image::make($file);
        $image->resize(300, 300);
        $mimeType = $image->mime();

        $userAvater->user_id   = $user->id;
        $userAvater->name      = $fileName;
        $userAvater->mime_type = $mimeType;

        DB::transaction(function () use($image, $filePath, $userAvater) {
            $userAvater->save();
            $image->save($filePath . $userAvater->name);
            $image->resize(100, 100)->save($filePath . "mini/" . $userAvater->name);
        });

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
