<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TransactionHeader;
use App\Helper\Status;

use Auth;
use Config;
use Response;

class TransactionHeaderController extends Controller
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
        $transactionHeader      = TransactionHeader::all();
        
        return Response::json(array(
            'status'                => $status,
            'transactionHeader'     => collect($transactionHeader)->toArray()),
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

        $transactionHeader                          = new TransactionHeader;
        $transactionHeader->user_id                 = Auth::user()->user_id;
        $transactionHeader->transaction_date        = date('Y-m-d H:i:s');
        $transactionHeader->status                  = Config::get('constants.STATUS_ACTIVE');
        $transactionHeader->save();

        return $this->show($transactionHeader->transaction_header_id);
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
        $transactionHeader      = TransactionHeader::find($id);

        return Response::json(array(
            'status'                => $status,
            'transactionHeader'     => collect($transactionHeader)->toArray()),
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
        $transactionHeader      = TransactionHeader::find($id);

        return Response::json(array(
            'status'                => $status,
            'transactionHeader'     => collect($transactionHeader)->toArray()),
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

        $transactionHeader                          = new TransactionHeader;
        $transactionHeader->user_id                 = Auth::user()->user_id;
        $transactionHeader->transaction_date        = date('Y-m-d H:i:s');
        $transactionHeader->status                  = Config::get('constants.STATUS_ACTIVE');
        $transactionHeader->save();

        return $this->show($transactionHeader->transaction_header_id);
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
