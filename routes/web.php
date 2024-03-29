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
    Route::get('/edit-admin/{admin_id}', 'App\Http\Controllers\AdminController@edit');
    Route::post('/update-account/{admin_id}', 'App\Http\Controllers\AdminController@update');
});
//product
Route::get('/show-product', 'App\Http\Controllers\ProductController@show_all');
Route::get('/add-product', 'App\Http\Controllers\ProductController@add_product');
Route::post('/product', 'App\Http\Controllers\ProductController@store');
Route::get('/edit-product/{product_id}', 'App\Http\Controllers\ProductController@edit');
Route::post('/update-product/{product_id}', 'App\Http\Controllers\ProductController@update');
Route::get('/search-product', 'App\Http\Controllers\ProductController@search');
Route::get('/delete-product/{product_id}', 'App\Http\Controllers\ProductController@destroy');
Route::post('/import-product', 'App\Http\Controllers\ProductController@import_product');
//phieunhap
Route::get('/show-phieunhap', 'App\Http\Controllers\NhapkhoController@show_all');
Route::get('/add-phieunhap', 'App\Http\Controllers\NhapkhoController@add_phieunhap');
Route::post('/phieunhap', 'App\Http\Controllers\NhapkhoController@store');
Route::get('/search-phieunhap', 'App\Http\Controllers\NhapkhoController@search');
Route::get('/show-detail/{mapn}', 'App\Http\Controllers\NhapkhoController@show_detail');
//phieuxuat
Route::get('/show-phieuxuat', 'App\Http\Controllers\XuatkhoController@show_all');
Route::get('/add-phieuxuat', 'App\Http\Controllers\XuatkhoController@add_phieuxuat');
Route::post('/phieuxuat', 'App\Http\Controllers\XuatkhoController@store');
Route::get('/search-phieuxuat', 'App\Http\Controllers\XuatkhoController@search');
Route::get('/show-details/{mapx}', 'App\Http\Controllers\XuatkhoController@show_detail');
//kho
Route::get('/show-kho', 'App\Http\Controllers\WarehouseController@show_all');
Route::post('/filter-by-date', 'App\Http\Controllers\WarehouseController@filter_by_date');
Route::post('/filter-by-date2', 'App\Http\Controllers\WarehouseController@filter_by_date2');
Route::post('/30day', 'App\Http\Controllers\WarehouseController@days_nhap');
Route::post('/30days', 'App\Http\Controllers\WarehouseController@days_xuat');
//export excel
Route::post('/export-csv/{mapn}', 'App\Http\Controllers\NhapkhoController@export_csv');
Route::post('/export-px/{mapx}', 'App\Http\Controllers\XuatkhoController@export_csv');
// Route::post('/import-csv', 'App\Http\Controllers\NhapkhoController@import_csv');
//export pdf
Route::get('/exportpn-pdf/{checkout_code}', 'App\Http\Controllers\NhapkhoController@print_order');
Route::get('/exportpx-pdf/{checkout_code}', 'App\Http\Controllers\XuatkhoController@print_order');
