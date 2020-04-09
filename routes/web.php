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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontController@index')->name('home');
Route::get('/shirts', 'FrontController@shirts')->name('shirts');
Route::get('/shirtpage/{id}', 'FrontController@shirtpage')->name('shirt');

//Admin

Route::group(['prefix' => 'admin', 'middleware'=> ['auth', 'admin']], function () {
    Route::post('toggledeliver/{orderId}', 'OrderController@toggledeliver')->name('toggle.deliver');

    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('product/create', 'ProductsController@create')->name('product.create');
    Route::post('product/store', 'ProductsController@store')->name('storeproduct');
    Route::get('product/index', 'ProductsController@index')->name('product.index');
    Route::get('product/edit', 'ProductsController@edit')->name('product.edit');
    Route::get('product/update', 'ProductsController@update')->name('product.update');
    Route::delete('product/destroy/{id}', 'ProductsController@destroy')->name('product.destroy');

    //Category
    Route::get('category/index', 'CategoriesController@index')->name('category.index');
    Route::post('categorystore', 'CategoriesController@store')->name('category.store');
    Route::get('categoryshow', 'CategoriesController@show')->name('category.show');

    Route::get('orders/{type?}','OrderController@Orders');




});

 //Address
Route::resource('address', 'AddressController');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout');

//Cart
Route::resource('/cart', 'CartController');
Route::get('/cart/additem/{id}', 'CartController@addItem')->name('cart.addItem');

//Checkout
Route::group(['middleware' => 'auth'], function () {
    Route::get('/shippinginfo', 'CheckoutController@shipping')->name('checkout.shipping');
    Route::post('review','ProductReviewController@store')->name('review.store');
});
Route::get('/checkout', 'CheckoutController@step1');

Route::get('/payment', 'CheckoutController@payment')->name('checkout.payment');
Route::post('storepayment', 'CheckoutController@storepayment')->name('payment.store');

