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

// Route::group(['middleware'=> ['is_admin']],[
//     Route::resource('users', App\Http\Controllers\Users::class)->only(['index']),
// ]);
// Route::group(['middleware'=> ['is_chef']],[
//     Route::resource('users', App\Http\Controllers\Users::class)->only(['index']),
// ]);
// Route::group(['middleware'=> ['is_clerk']],[
//     Route::resource('users', App\Http\Controllers\Users::class)->only(['index']),
// ]);

Route::group(['prefix' => 'admin','as' => 'admin.','middleware' => 'check_roke:admin'], function(){
    Route::resource('users', App\Http\Controllers\UserController::class)->only(['edit','update']);
    Route::resource('checklist_groups', App\Http\Controllers\Admin\ChecklistGroupController::class);
});

Route::group(['prefix' => 'chef','as' => 'chef.','middleware' => 'check_roke:chef'], function(){
    //
});

Route::group(['prefix' => 'staff','as' => 'staff.','middleware' => 'check_roke:staff'], function(){
    //
});