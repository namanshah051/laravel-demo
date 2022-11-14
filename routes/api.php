<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'UserController@authenticate');
Route::post('signup', 'UserController@signup');
Route::post('forgot-password', 'UserController@forgetPassword');
Route::post('social-login', 'UserController@socialMediaRegister');
Route::post('signup-apple', 'UserController@signupAppleid');


Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('profile/{user_id}', 'UserController@getUserProfile');
    Route::post('update-profile', 'UserController@updateUserProfile');
    Route::post('logout', 'UserController@logout');
    Route::post('change-password', 'UserController@changePassword');
    Route::post('user/get-anotheruser-profile', 'UserController@getAnotherUserProfile');
});
