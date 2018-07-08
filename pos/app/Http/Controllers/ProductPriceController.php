<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductPrice;
use App\Helper\Status;

use Auth;
use Config;
use Response;

class ProductPriceController extends Controller
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
        $productPrice           = ProductPrice::all();
        
        return Response::json(array(
            'status'        => $status,
            'productPrice'      => collect($productPrice)->toArray()),
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

        $productPrice                           = new ProductPrice;
        $productPrice->product_id               = $request->product_id;
        $productPrice->uom_id                   = $request->uom_id;
        $productPrice->price                    = $request->price;
        $productPrice->promo_product            = $request->promo_product;
        $productPrice->status                   = $request->status;
        $productPrice->save();

        return $this->show($productPrice->product_id);
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
        $productPrice           = ProductPrice::find($id);

        return Response::json(array(
            'status'        => $status,
            'discount'      => collect($productPrice)->toArray()),
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
        $productPrice           = ProductPrice::find($id);

        return Response::json(array(
            'status'        => $status,
            'discount'      => collect($productPrice)->toArray()),
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

        $productPrice                           = ProductPrice::find($id);
        $productPrice->product_id               = $request->product_id;
        $productPrice->uom_id                   = $request->uom_id;
        $productPrice->price                    = $request->price;
        $productPrice->promo_product            = $request->promo_product;
        $productPrice->status                   = $request->status;
        $productPrice->save();

        return $this->show($productPrice->product_id);
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
