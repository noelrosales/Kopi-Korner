<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::resource('category',             'CategoryController');
    Route::resource('discount',             'DiscountController');
    Route::resource('product',              'ProductController');
    Route::resource('productprice',         'ProductPriceController');
    Route::resource('receipt',              'ReceiptController');
    Route::resource('transactiondetail',    'TransactionDetailController');
    Route::resource('transactiondheader',   'TransactionHeaderController');
    Route::resource('uom',                  'UomController');
    Route::resource('user',                 'UserController');
});