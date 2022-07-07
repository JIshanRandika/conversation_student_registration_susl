<?php

use App\Models\VCorRegComment;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('/getPDF', [App\Http\Controllers\PDFController::class, 'download']);

Route::group(['middleware'=>'auth'], function () {
    Route::get('permissions-all-users',['middleware'=>'check-permission:user|admin|superadmin','uses'=>'HomeController@allUsers']);
    Route::get('permissions-admin-superadmin',['middleware'=>'check-permission:admin|superadmin','uses'=>'HomeController@adminSuperadmin']);
    Route::get('permissions-superadmin',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@superadmin']);
});


Route::get('/edit-records','App\Http\Controllers\UserDetailsController@index');
Route::get('edit/{id}','App\Http\Controllers\UserDetailsController@show');
Route::post('edit/{id}','App\Http\Controllers\UserDetailsController@edit');
Route::get('delete/{id}','App\Http\Controllers\UserDetailsController@destroy');

;


Route::get('/tab1',function (){
    return view('home');
});
Route::get('/tab2',function (){
    return view('home');
});
Route::get('/tab3',function (){
    return view('home');
});
