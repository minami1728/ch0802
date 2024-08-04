<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'user'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::get('login', 'App\Http\Controllers\UserAuthController@Login');
        Route::get('signup', 'App\Http\Controllers\UserAuthController@SignUp');  
        Route::get('happy', 'App\Http\Controllers\UserAuthController@Happy');
        Route::get('cat', 'App\Http\Controllers\UserAuthController@Cat');
        Route::get('profile/{id}', 'App\Http\Controllers\UserAuthController@Profile');
        Route::get('sign_up', 'App\Http\Controllers\UserAuthController@Sign_Up');
        Route::post('sign_up', 'App\Http\Controllers\UserAuthController@Sign_Up'); 
    });
});

Route::group(['prefix' => 'merchandise'], function () {
    Route::get('{merchandise_id}', 'App\Http\Controllers\MerchandiseController@MerchandiseItemPage');
});




