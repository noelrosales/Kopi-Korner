<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Helper\Status;

use Auth;
use Config;
use Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status                 = new Status;
        $status->code           = Config::get('constants.STATUS_SUCCESS.CODE');
        $status->description    = Config::get('constants.STATUS_SUCCESS.DESCRIPTION');
        $user                   = User::all();
        
        return Response::json(array(
            'status'                => $status,
            'transactionDetail'     => collect($user)->toArray()),
            200
        );
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
        $status                 = new Status;
        $status->code           = Config::get('constants.STATUS_SUCCESS.CODE');
        $status->description    = Config::get('constants.STATUS_SUCCESS.DESCRIPTION');

        $user                       = new User;
        $user->user_type            = $request->user_type;
        $user->last_name            = $request->last_name;
        $user->first_name           = $request->first_name;
        $user->address              = $request->address;
        $user->username             = $request->username;
        $user->contact_no           = $request->contact_no;
        $user->email                = $request->email;
        $user->password             = bcrypt($request->password);
        $user->status               = Config::get('constants.STATUS_ACTIVE');
        $user->save();

        return $this->show($user->user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status                 = new Status;
        $status->code           = Config::get('constants.STATUS_SUCCESS.CODE');
        $status->description    = Config::get('constants.STATUS_SUCCESS.DESCRIPTION');
        $user                   = User::find($id);

        return Response::json(array(
            'status'          => $status,
            'user'            => collect($user)->toArray()),
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status                 = new Status;
        $status->code           = Config::get('constants.STATUS_SUCCESS.CODE');
        $status->description    = Config::get('constants.STATUS_SUCCESS.DESCRIPTION');
        $user                   = User::find($id);

        return Response::json(array(
            'status'          => $status,
            'user'            => collect($user)->toArray()),
            200
        );
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
        $status                 = new Status;
        $status->code           = Config::get('constants.STATUS_SUCCESS.CODE');
        $status->description    = Config::get('constants.STATUS_SUCCESS.DESCRIPTION');

        $user                       = User::find($id);
        $user->user_type            = $request->user_type;
        $user->last_name            = $request->last_name;
        $user->first_name           = $request->first_name;
        $user->address              = $request->address;
        $user->username             = $request->username;
        $user->contact_no           = $request->contact_no;
        $user->email                = $request->email;
        $user->password             = bcrypt($request->password);
        $user->status               = Config::get('constants.STATUS_ACTIVE');
        $user->save();

        return $this->show($user->user_id);
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
