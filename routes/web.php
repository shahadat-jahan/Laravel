<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ThanaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPurchaseController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Home route
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/gallery', 'HomeController@gallery')->name('gallery');
Route::post('/image', 'HomeController@image')->name('image');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/new-customer-modal', 'HomeController@newCustomerModal')->name('newCustomerModal');

//Customer route
Route::get('/customers', 'CustomerController@index')->name('customers.index');
Route::get('/customers/create', 'CustomerController@create')->name('customers.create');
Route::post('/customers', 'CustomerController@store')->name('customers.store');
Route::get('/customers/show/{id}', 'CustomerController@show')->name('customers.show');
Route::get('/customers/edit/{id}', 'CustomerController@edit')->name('customers.edit');
Route::post('/customers/update', 'CustomerController@update')->name('customers.update');
Route::get('/customers/destroy/{id}', 'CustomerController@destroy')->name('customers.destroy');
Route::post('/customers/modal', 'CustomerController@modal')->name('customers.modal');
Route::post('/customers/get-district', 'CustomerController@getDistrict')->name('customers.getDistrict');
Route::post('/customers/get-thana', 'CustomerController@getThana')->name('customers.getThana');
Route::post('/customers/search', 'CustomerController@search')->name('customers.search');
Route::post('/customers/limit', 'CustomerController@limit')->name('customers.limit');
Route::post('customers/chng-status', 'CustomerController@chngStatus')->name('customers.chngStatus');

//Division route
Route::get('/divisions', 'DivisionController@index')->name('divisions.index');
Route::get('/divisions/create', 'DivisionController@create')->name('divisions.create');
Route::post('/divisions', 'DivisionController@store')->name('divisions.store');
Route::get('/divisions/destroy/{id}', 'DivisionController@destroy')->name('divisions.destroy');

//District route
Route::get('/districts', 'DistrictController@index')->name('districts.index');
Route::get('/districts/create', 'DistrictController@create')->name('districts.create');
Route::post('/districts', 'DistrictController@store')->name('districts.store');
Route::get('/districts/destroy/{id}', 'DistrictController@destroy')->name('districts.destroy');
Route::post('/districts/limit', 'DistrictController@limit')->name('districts.limit');

//Thana route
Route::get('/thanas', 'ThanaController@index')->name('thanas.index');
Route::get('/thanas/create', 'ThanaController@create')->name('thanas.create');
Route::post('/thanas', 'ThanaController@store')->name('thanas.store');
Route::get('/thanas/destroy/{id}', 'ThanaController@destroy')->name('thanas.destroy');
Route::post('/thanas/limit', 'ThanaController@limit')->name('thanas.limit');

//Product route
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/create', 'ProductController@create')->name('products.create');
Route::post('/products', 'ProductController@store')->name('products.store');
Route::get('/products/show/{id}', 'ProductController@show')->name('products.show');
Route::get('/products/edit/{id}', 'ProductController@edit')->name('products.edit');
Route::post('/products/update', 'ProductController@update')->name('products.update');
Route::get('/products/destroy/{id}', 'ProductController@destroy')->name('products.destroy');
Route::post('/products/search', 'ProductController@search')->name('products.search');
Route::post('/products/limit', 'ProductController@limit')->name('products.limit');

//Order route
Route::get('/orders', 'OrderController@index')->name('orders.index');
Route::post('/orders/limit', 'OrderController@limit')->name('orders.limit');
Route::post('/orders/search', 'OrderController@search')->name('orders.search');
Route::get('/orders/destroy/{id}', 'OrderController@destroy')->name('orders.destroy');
Route::get('/orders/report', 'OrderController@report')->name('orders.report');
Route::post('/orders/show-report', 'OrderController@showReport')->name('orders.showReport');

//ProductPurchase route
Route::get('/product-purchases', 'ProductPurchaseController@index')->name('productPurchases.index');
Route::get('/product-purchases/create', 'ProductPurchaseController@create')->name('productPurchases.create');
Route::post('/product-purchases', 'ProductPurchaseController@store')->name('productPurchases.store');
Route::get('/product-purchases/show/{id}', 'ProductPurchaseController@show')->name('productPurchases.show');
Route::get('/product-purchases/edit/{id}', 'ProductPurchaseController@edit')->name('productPurchases.edit');
Route::post('/product-purchases/update', 'ProductPurchaseController@update')->name('productPurchases.update');
Route::get('/product-purchases/destroy/{id}', 'ProductPurchaseController@destroy')->name('productPurchases.destroy');
Route::post('/product-purchases/search', 'ProductPurchaseController@search')->name('productPurchases.search');
Route::post('/product-purchases/limit', 'ProductPurchaseController@limit')->name('productPurchases.limit');
Route::post('/product-purchases/row', 'ProductPurchaseController@row')->name('productPurchases.row');