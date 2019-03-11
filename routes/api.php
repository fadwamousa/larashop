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

Route::group(['prefix'=>'v1','namespace'=>'api',['middleware'=>'auth:api']],function(){

	Route::get('products','ShopController@showPro');
    Route::get('products/{id?}','ShopController@showProid');
    Route::get('articles','ShopController@showArticle');
    Route::get('articles/{id?}','ShopController@showArticleid');
    Route::post('articles','ShopController@storeArticle');

    Route::put('articles/{id}','ShopController@update');

    Route::delete('articles/{id}','ShopController@delete');
});

Route::group(['prefix'=>'v2','namespace'=>'api'],function(){

	Route::get('tasks','TasksController@show')->name('tasks.all');
	Route::get('tasks/{task}','TasksController@showid')->name('tasks.task');
    Route::post('tasks','TasksController@store')->name('tasks.store');
});

//api/v1/products/1
//api/v2/tasks



