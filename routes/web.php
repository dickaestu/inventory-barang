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

Route::middleware(['auth'])
->group(function () {
    
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/order-list/export', 'OrderListController@export')->name('order-list.export')->middleware(['admin','kepala.bidang']);
    Route::get('/order-list/export/filter', 'OrderListController@exportByFilter')->name('order-list.export-filter')->middleware(['admin','kepala.bidang']);
    Route::get('/movement-request/print-invoice/{id}', 'MovementRequestController@printInvoice')->name('print-invoice')->middleware(['admin','kepala.bidang']);

    
    
    Route::resource('/order-list', 'OrderListController');
    Route::resource('/product-list', 'ProductListController');
    Route::resource('/product-category', 'ProductCategoryController')->middleware(['kepala.bidang']);
    Route::resource('/movement-request', 'MovementRequestController')->middleware(['admin']);
    
});

Auth::routes();

