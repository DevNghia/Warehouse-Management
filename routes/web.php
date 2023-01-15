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
//Product_Type
Route::get('/show-product-type', 'App\Http\Controllers\ProductTypeController@show_all');
Route::get('/add-product-type', 'App\Http\Controllers\ProductTypeController@add_product_type');
Route::post('/product-type', 'App\Http\Controllers\ProductTypeController@store');
Route::get('/edit-product-type/{product_type_id}', 'App\Http\Controllers\ProductTypeController@edit');
Route::post('/update-product-type/{product_type_id}', 'App\Http\Controllers\ProductTypeController@update');
// Route::get('/delete-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@delete_category_product');