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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('welcome');


Route::group(['prefix' => 'admin','as' => 'admin.','middleware' => 'check_role:admin'], function(){
    Route::resource('customers', CustomerController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('orders', OrderController::class);
    Route::post('orders/elevate/{id}', 'OrderController@elevateStatus')->name('orders.elevateStatus');
    Route::resource('vouchers', VoucherController::class)->only(['index']);
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    // Route::delete('images',[\App\Http\Controllers\ImageController::class,'destroy'])->name('images.destroy');
});

Route::group(['prefix' => 'chef','as' => 'chef.','middleware' => 'check_role:chef'], function(){
    Route::get('orders', 'OrderController@indexAsChef')->name('orders.index');
    Route::post('orders/elevate/{id}', 'OrderController@confirmAsChef')->name('orders.confirmAsChef');
    // Route::post('orders', 'OrderController@confirmAsChef')->name('orders.confirmasChef');
    // Route::resource('menu', MenuController::class)->only(['index',]);
});

// Route::group(['prefix' => 'clerk','as' => 'clerk.','middleware' => 'check_role:clerk'], function(){
//     //
// });
