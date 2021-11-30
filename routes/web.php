<?php

//use App\Http\Controllers\VoucherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
    Route::resource('customers', CustomerController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('vouchers', VoucherController::class);

    //Switch status of orders
    Route::post('orders/elevate/{id}', 'OrderController@elevateStatus')->name('orders.elevateStatus');
    
});

Route::group(['prefix' => 'chef','as' => 'chef.','middleware' => 'check_role:chef'], function(){
    Route::get('orders', 'OrderController@indexAsChef')->name('orders.index');
    Route::post('orders/elevate/{id}', 'OrderController@confirmAsChef')->name('orders.confirmAsChef');
    
});

Route::group(['prefix' => 'clerk','as' => 'clerk.','middleware' => 'check_role:clerk'], function(){
    Route::post('orders', 'OrderController@confirmAsClerk')->name('orders.confirmAsClerk');
});


Route::get('customers', 'CustomerController@create')->name('customers.register');
Route::post('customers', 'CustomerController@store')->name('customers.store');



// Route::get('/webhook', 'WebhookController@index')->name('webhook.index');
// Route::post('/webhook', 'WebhookController@receive')->name('webhook.receive');
// if ($this->app['config']->get('fb-messenger.debug')) {
//     Route::get('fb-messenger/debug', 'DebugController@index');
// }