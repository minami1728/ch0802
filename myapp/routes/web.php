<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthUserAdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'user'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::get('login', 'App\Http\Controllers\UserAuthController@Login')->name('user.auth.login');
        Route::post('login', 'App\Http\Controllers\UserAuthController@LoginProcess');

        Route::get('signup', 'App\Http\Controllers\UserAuthController@SignUp');  
        Route::get('happy', 'App\Http\Controllers\UserAuthController@Happy');
        Route::get('cat', 'App\Http\Controllers\UserAuthController@Cat');
        Route::get('profile/{id}', 'App\Http\Controllers\UserAuthController@Profile');
        Route::get('sign_up', 'App\Http\Controllers\UserAuthController@Sign_Up')->name('user.auth.sign_up');
        Route::post('sign_up', 'App\Http\Controllers\UserAuthController@Sign_UpProcess'); 

        Route::get('page', 'App\Http\Controllers\UserAuthController@Page')->name('user.auth.page');

        Route::get('signout', 'App\Http\Controllers\UserAuthController@SignOut')->name('user.auth.signout');  
    });
});

Route::group(['prefix' => 'merchandise'], function () {
    Route::get('manage', 'App\Http\Controllers\MerchandiseController@MerchandiseManage')->name('merchandise.manage');
    Route::get('create', 'App\Http\Controllers\MerchandiseController@MerchandiseCreate')->middleware([AuthUserAdminMiddleware::class]);

    Route::group(['prefix' => '{merchandise_id}'], function () {
        Route::get('edit', 'App\Http\Controllers\MerchandiseController@MerchandiseEdit')->middleware(AuthUserAdminMiddleware::class);
        Route::put('/', 'App\Http\Controllers\MerchandiseController@MerchandiseEditProcess');

        Route::get('delete', 'App\Http\Controllers\MerchandiseController@MerchandiseDelete')->middleware(AuthUserAdminMiddleware::class);
    });
});




