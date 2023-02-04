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

Route::get('/', function () {

    return view('login');
});
Route::get('/login', 'App\Http\Controllers\AdminController@index');
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');
Route::post('/admin-dashboard', 'App\Http\Controllers\AdminController@dashboard');
Route::get('/logout', 'App\Http\Controllers\AdminController@logout');


//
Route::group(['middleware' => 'roles'], function () {
    Route::get('/show-product-type', 'App\Http\Controllers\ProductTypeController@show_all');
    //Product_Type
    Route::get('/add-product-type', 'App\Http\Controllers\ProductTypeController@add_product_type');
    Route::post('/product-type', 'App\Http\Controllers\ProductTypeController@store');
    Route::get('/edit-product-type/{product_type_id}', 'App\Http\Controllers\ProductTypeController@edit');
    Route::post('/update-product-type/{product_type_id}', 'App\Http\Controllers\ProductTypeController@update');
    Route::get('/search-product-type', 'App\Http\Controllers\ProductTypeController@search');
    Route::get('/delete-product-type/{product_type_id}', 'App\Http\Controllers\ProductTypeController@destroy');
    //calculation
    Route::get('/show-calculation', 'App\Http\Controllers\CalculationController@show_all');
    Route::get('/add-calculation', 'App\Http\Controllers\CalculationController@add_calculation');
    Route::post('/calculation', 'App\Http\Controllers\CalculationController@store');
    Route::get('/edit-calculation/{calculation_id}', 'App\Http\Controllers\CalculationController@edit');
    Route::post('/update-calculation/{calculation_id}', 'App\Http\Controllers\CalculationController@update');
    Route::get('/search-calculation', 'App\Http\Controllers\CalculationController@search');
    Route::get('/delete-calculation/{calculation_id}', 'App\Http\Controllers\CalculationController@destroy');
    //supplier
    Route::get('/show-supplier', 'App\Http\Controllers\SupplierController@show_all');
    Route::get('/add-supplier', 'App\Http\Controllers\SupplierController@add_supplier');
    Route::post('/supplier', 'App\Http\Controllers\SupplierController@store');
    Route::get('/edit-supplier/{supplier_id}', 'App\Http\Controllers\SupplierController@edit');
    Route::post('/update-supplier/{supplier_id}', 'App\Http\Controllers\SupplierController@update');
    Route::get('/search-supplier', 'App\Http\Controllers\SupplierController@search');
    Route::get('/delete-supplier/{supplier_id}', 'App\Http\Controllers\SupplierController@destroy');
    //account
    Route::get('/show-all-account', 'App\Http\Controllers\AdminController@show_all');
    Route::get('/add-account', 'App\Http\Controllers\AdminController@add_account');
    Route::post('/admin', 'App\Http\Controllers\AdminController@store');
});
//product
Route::get('/show-product', 'App\Http\Controllers\ProductController@show_all');
Route::get('/add-product', 'App\Http\Controllers\ProductController@add_product');
Route::post('/product', 'App\Http\Controllers\ProductController@store');
Route::get('/edit-product/{product_id}', 'App\Http\Controllers\ProductController@edit');
Route::post('/update-product/{product_id}', 'App\Http\Controllers\ProductController@update');
Route::get('/search-product', 'App\Http\Controllers\ProductController@search');
Route::get('/delete-product/{product_id}', 'App\Http\Controllers\ProductController@destroy');
