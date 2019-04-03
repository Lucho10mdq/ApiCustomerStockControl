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
//CUSTOMER

Route::post('customer','CustomerController@store');
Route::post('customerSearch','CustomerController@searchDni');
Route::get('customer','CustomerController@index');
Route::get('customer/{id}', 'CustomerController@show');
Route::put('customer/{id}', 'CustomerController@update');
Route::delete('customer/{id}', 'CustomerController@destroy');

//CATEGORY

Route::post('category','CategoryController@store');
Route::post('searchCategory','CategoryController@searchDescription');
Route::get('category','CategoryController@index');
Route::get('category/{id}','CategoryController@show');
Route::put('category/{id}','CategoryController@update');
Route::delete('category/{id}','CategoryController@destroy');

//PRODUCT 
Route::post('product','ControllerProduct@store');
Route::post('searchProduct','ControllerProduct@searchCode');
Route::get('product','ControllerProduct@index');
Route::get('product/{id}','ControllerProduct@show');
Route::delete('product/{id}','ControllerProduct@destroy');