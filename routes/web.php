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


Route::group(['middleware' => ['guest']], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/main', function () {
        return view('welcome');
    })->name('main');

    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::group(['middleware' => ['auth']], function () {
        // rutas de roles
        Route::get('/rol', 'RolController@index');

        // rutas de usuarios
        Route::get('/user', 'UserController@index');
        Route::get('/user/create', 'UserController@create');
        Route::post('/user/register', 'UserController@store');
        Route::put('/user/update', 'UserController@update');
        Route::put('/user/active', 'UserController@active');
        Route::put('/user/deactive', 'UserController@deactive');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
