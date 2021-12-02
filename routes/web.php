<?php

//use App\Http\Controllers\VoucherController;
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
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('export/customers', 'ExportController@export')->name('export.customers');

    Route::resource('customers', CustomerController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('vouchers', VoucherController::class);

    //Switch status of orders
    Route::post('orders/elevate/{id}', 'OrderController@elevateStatus')->name('orders.elevateStatus');
    
    //Send voucher to users
    Route::post('vouchers/send/{voucher}', 'VoucherController@sendUsers')->name('vouchers.sendUsers');

    //Update image
    Route::post('image/{menu_id}','ImageController@update')->name('menu.imageUpload');
    Route::delete('image/{menu_id}','ImageController@destroy')->name('menu.imageDestroy');
});

Route::group(['prefix' => 'chef','as' => 'chef.','middleware' => 'check_role:chef'], function(){
    Route::get('orders', 'OrderController@indexAsChef')->name('orders.index');
    Route::post('orders/elevate/{id}', 'OrderController@confirmAsChef')->name('orders.confirmAsChef');
    
});

Route::group(['prefix' => 'clerk','as' => 'clerk.','middleware' => 'check_role:clerk'], function(){
    Route::get('orders', 'OrderController@indexAsClerk')->name('orders.index');
    Route::get('orders/create', 'OrderController@createAsClerk')->name('orders.create');
    Route::get('orders/{order}', 'OrderController@edit')->name('orders.edit');
    Route::post('orders/elevate/{id}', 'OrderController@confirmAsClerk')->name('orders.confirmAsClerk');
});


Route::get('customers', 'Customer\CustomerController@create')->name('customers.register');
Route::post('customers', 'Customer\CustomerController@store')->name('customers.store');
Route::get('history/purchase', 'Customer\HistoryController@index')->name('customers.purchase');
