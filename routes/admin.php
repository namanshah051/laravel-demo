<?php
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/dashboard', function () {
        return view('admin/dashboard');
    });*/
Route::get('login', 'AuthController@login')->name('admin.login');
Route::post('login', 'AuthController@doLogin')->name('admin.doLogin');
Route::group(['middleware' => 'auth'], function () {
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
	Route::get('logout', 'AuthController@logout')->name('admin.logout');
});