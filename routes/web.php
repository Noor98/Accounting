<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//static method get in Route Class
//static variable or method
//class variable or class method not instance variable
/*Route::get('/', function () {
    return view('welcome');
});*/

/*
 *  Set up locale and locale_prefix if other language is selected
 */

Route::get('/',"DefaultController@index");

Route::get('/accounteq/{id}/delete',"AccountEQController@destroy");
Route::get('/accounteq/search',"AccountEQController@search");
Route::get('/accounteq/searchpaging',"AccountEQController@searchpaging");
Route::get('/accounteq/searchpagingadv',"AccountEQController@searchpagingadv");
Route::get('/accounteq/paging',"AccountEQController@paging");
Route::resource('accounteq', 'AccountEQController');




Route::get('/category/{id}/delete',"CategoryController@destroy");
Route::resource('category', 'CategoryController');

Route::get('/customer/{id}/delete',"CustomerController@destroy");
Route::resource('customer', 'CustomerController');

Route::get('/account/{id}/delete',"AccountingController@destroy");
Route::get('/account/by_operation_type/{id}',"AccountingController@by_operation_type");
Route::resource('account', 'AccountingController');
Route::get('/item/{id}/delete',"ItemController@destroy");
Route::resource('item', 'ItemController');
Route::get('/admin/{id}/delete',"AdminController@destroy");
Route::get('/admin/{id}/permission',"AdminController@permission");
Route::post('/admin/setpermission/{id}',"AdminController@setpermission");
Route::resource('admin', 'AdminController');

Route::resource('operation', 'OperationController');
Route::resource('payment', 'PaymentController');
Route::resource('voucher', 'VoucherController');
Auth::routes();

Route::get('/home/noaccess',"HomeController@noaccess");
Route::get('/home', 'HomeController@index')->name('home');
/*if (in_array(Request::segment(1), Config::get('app.alt_langs'))) {
    App::setLocale(Request::segment(1));
}
Route::get("/{locale}/login","LoginController@index");*/




