<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TransactionDetail;
use App\Helper\Status;

use Auth;
use Config;
use Response;

class TransactionDetailController extends Controller
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
        $transactionDetail      = TransactionDetail::all();
        
        return Response::json(array(
            'status'                => $status,
            'transactionDetail'     => collect($transactionDetail)->toArray()),
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

        $transactionDetail                          = new TransactionDetail;
        $transactionDetail->transaction_id          = $request->product_id;
        $transactionDetail->product_price_id        = date('Y-m-d H:i:s');
        $transactionDetail->save();

        return $this->show($transactionDetail->transaction_detail_id);
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
        $transactionDetail      = TransactionDetail::find($id);

        return Response::json(array(
            'status'                => $status,
            'transactionDetail'     => collect($transactionHeader)->toArray()),
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
        $transactionDetail      = TransactionDetail::find($id);

        return Response::json(array(
            'status'                => $status,
            'transactionDetail'     => collect($transactionHeader)->toArray()),
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

        $transactionDetail                          = TransctionDetail::findd($id);
        $transactionDetail->transaction_id          = $request->product_id;
        $transactionDetail->product_price_id        = date('Y-m-d H:i:s');
        $transactionDetail->save();

        return $this->show($transactionDetail->transaction_detail_id);
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
