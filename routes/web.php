<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::resource('product', 'ProductController', ['only' =>['index', 'show']]);
Route::group(['prefix' => 'admin','middleware' => ['auth','admin']], function()
{
  Route::get('/', function () {
    return view('admin');
  });
    Route::resource('product', 'ProductController',['except'=>['index','show']]);
    Route::get('/orders', 'OrderController@index');
    Route::get('/cart/{user}/{order}', 'OrderController@viewCustomerOrder') ->name('admin.view.cart');

});


Auth::routes();
Route::group(['middleware'=>'auth'],function()
{
  Route::get('/cart', 'OrderController@showOrder') ->name('cart');
  Route::get('/orders/history', 'OrderController@viewOrderHistory');
  Route::get('/cart/submit/{order}', 'OrderController@confirmOrder')->name('cart.submit');
  Route::get('/orders/deliver/{order}', 'OrderController@deliverOrder')->name('orders.deliver');
  Route::get('/cart/viewsummary/{order}', 'OrderController@showOrderHistory')->name('cart.viewsummary');
  Route::get('/cart/remove/{orderdetail}', 'OrderController@removeOrderDetail')->name('cart.remove');
  Route::get('/cart/edit/{orderdetail}', 'OrderController@editOrderDetail')->name('cart.edit');
  Route::put('/cart/edit/{orderdetail}', 'OrderController@updateOrderDetail')->name('cart.edit');
  Route::get('/cart/add/{product}', 'OrderController@addOrderDetail')->name('cart.add');
  Route::post('/cart/add/{product}', 'OrderController@storeOrderDetail')->name('cart.add');
  Route::resource('user','UserController',['except' => ['destroy','index','create']]);


});
Route::get('/home', 'ProductController@index');
