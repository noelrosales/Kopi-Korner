<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Uom;
use App\Helper\Status;

use Auth;
use Config;
use Response;

class UomController extends Controller
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
        $uom                    = Uom::all();
        
        return Response::json(array(
            'status'                => $status,
            'uom'                   => collect($uom)->toArray()),
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

        $uom                        = new uom;
        $uom->uom_val               = $request->uom_val;
        $uom->description           = $request->description;
        $uom->status                = Config::get('constants.STATUS_ACTIVE');
        $uom->save();

        return $this->show($uom->uom);
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
        $uom                    = Uom::find($id);

        return Response::json(array(
            'status'        => $status,
            'uom'           => collect($uom)->toArray()),
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
        $uom                    = Uom::find($id);

        return Response::json(array(
            'status'        => $status,
            'uom'           => collect($uom)->toArray()),
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

        $uom                        = Uom::find($id);
        $uom->uom_val               = $request->uom_val;
        $uom->description           = $request->description;
        $uom->status                = Config::get('constants.STATUS_ACTIVE');
        $uom->save();

        return $this->show($uom->uom_id);
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
