<?php

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

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});
Route::get('/', function () {
    return view('site.index');
});
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/forbidden',function(){
    return view('panel.error.forbiden');
})->name('forbidden');

Route::resource('permision','PermissionController')->middleware('permission:permission.index');

Route::resource('users','UserController')->middleware('permission:users.index');

Route::resource('roles','RoleController')->middleware('permission:users.index');

Route::resource('customer','CustomerController')->middleware('permission:users.index');
