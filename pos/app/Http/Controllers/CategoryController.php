<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Helper\Status;

use Auth;
use Config;
use Response;

class CategoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $status                 = new Status;
        $status->code           = Config::get('constants.STATUS_SUCCESS.CODE');
        $status->description    = Config::get('constants.STATUS_SUCCESS.DESCRIPTION');
        $category               = Category::all();
        
        return Response::json(array(
            'status'        => $status,
            'category'      => collect($category)->toArray()),
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

        $category                           = new Category;
        $category->category_name            = $request->category_name;
        $category->category_description     = $request->category_name;
        $category->save();

        return $this->show($category->category_id);
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
        $category               = Category::find($id);

        return Response::json(array(
            'status'        => $status,
            'category'      => collect($category)->toArray()),
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
        $category               = Category::find($id);

        return Response::json(array(
            'status'        => $status,
            'category'      => collect($category)->toArray()),
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

        $category                           = Category::find($id);
        $category->category_name            = $request->category_name;
        $category->category_description     = $request->category_name;
        $category->save();

        return $this->show($category->category_id);
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
