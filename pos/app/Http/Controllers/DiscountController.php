<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Discount;
use App\Helper\Status;

use Auth;
use Config;
use Response;

class DiscountController extends Controller
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
        $discount               = Discount::all();
        
        return Response::json(array(
            'status'        => $status,
            'discount'      => collect($discount)->toArray()),
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

        $discount                           = new Discount;
        $discount->discount_type            = $request->discount_type;
        $discount->percent_vat              = $request->percent_vat;
        $discount->vat_status               = $request->vat_status;
        $discount->percent_discount         = $request->percent_discount;
        $discount->discount_status          = $request->discount_status;
        $discount->save();

        return $this->show($discount->discount_id);
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
        $discount               = Discount::find($id);

        return Response::json(array(
            'status'        => $status,
            'discount'      => collect($discount)->toArray()),
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
        $discount               = Discount::find($id);

        return Response::json(array(
            'status'        => $status,
            'discount'      => collect($discount)->toArray()),
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

        $discount                           = Discount::find($id);
        $discount->discount_type            = $request->discount_type;
        $discount->percent_vat              = $request->percent_vat;
        $discount->vat_status               = $request->vat_status;
        $discount->percent_discount         = $request->percent_discount;
        $discount->discount_status          = $request->discount_status;
        $discount->save();

        return $this->show($discount->discount_id);

        return Response::json(array(
            'status'        => $status,
            'discount'      => collect($discount)->toArray()),
            200
        );
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
