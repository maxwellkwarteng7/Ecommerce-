<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@index');
Route::get('/redirect','HomeController@redirect')->middleware('auth','verified');
Route::get('/view_products/{id}','HomeController@view_products');
Route::get('/cash_order','HomeController@cash_order');
Route::get('/stripe/{total}','HomeController@stripe');
Route::post('stripe/{total}','HomeController@stripePost')->name('stripe.post');
Route::post('/addcart/{id}','HomeController@addcart');
Route::get('/view_cart','HomeController@view_cart');
Route::get('/deletecart/{id}','HomeController@deletecart');
Route::get('/view_user_order','HomeController@view_user_order');
Route::get('/cancel_order/{id}','HomeController@cancel_order');
Route::post('/add_comment','HomeController@add_comment');
Route::post('/reply_comment','HomeController@reply_comment');
Route::post('/search_products','HomeController@searchProduct');

// Admin controller
Route::get('/category','AdminController@category');
Route::post('/addcategory','AdminController@addcategory');
Route::get('/deleteCategory/{id}','AdminController@deleteCategory');
Route::post('/searchCategory','AdminController@searchCategory');
Route::get('/addproduct','AdminController@addproduct');
Route::post('/additem','AdminController@additem');
Route::post('/searchProduct','AdminController@searchProduct');
Route::get('/deleteproduct/{id}','AdminController@deleteproduct');
Route::get('/editproduct/{id}','AdminController@editproduct');
Route::post('/storeupdatedproduct/{id}','AdminController@storeupdatedproduct');
Route::get('/orders','AdminController@orders');
Route::get('/delivered/{id}','AdminController@delivered');
Route::post('/searchOrders','AdminController@searchOrders');
Route::get('/print_order/{id}','AdminController@print_order');
Route::get('/send_email/{id}','AdminController@send_email');
Route::post('/send_user_email/{id}','AdminController@send_user_email');












Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
