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



Route::post('login', 'Auth\LoginController@loginApi');
Route::post('logout', 'Auth\LoginController@logoutApi');



Route::middleware('auth:api')->get('category', function() {
    $user = \Auth::guard('api')->user();
    return response()->json(['user_id' => $user->id,
        "category"=>\App\Category::all()], 200);
    //return $user;//\App\Product::all();
});
