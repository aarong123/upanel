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
        Route::get('/user/edit/{person}', 'UserController@edit');
        Route::put('/user/update/{person}', 'UserController@update');
        Route::delete('/user/trashed/active/{person}', 'UserController@active');
        Route::delete('/user/deactive/{person}', 'UserController@deactive');
        Route::get('/user/trashed', 'UserController@trashed');

        // rutas de categorias
        Route::get('/category', 'CategoryController@index');
        Route::get('/category/create', 'CategoryController@create');
        Route::post('/category/register', 'CategoryController@store');
        Route::get('/category/edit/{category}', 'CategoryController@edit');
        Route::put('/category/update/{category}', 'CategoryController@update');
        Route::delete('/category/deactive/{category}', 'CategoryController@deactive');
        Route::delete('/category/active/{category}', 'CategoryController@active');

        // rutas de productos
        Route::get('/item', 'ItemController@index');
        Route::get('/item/create', 'ItemController@create');
        Route::post('/item/register', 'ItemController@store');
        Route::get('/item/edit/{item}', 'ItemController@edit');
        Route::put('/item/update/{item}', 'ItemController@update');
        Route::delete('/item/deactive/{item}', 'ItemController@deactive');
        Route::delete('/item/active/{item}', 'ItemController@active');
        Route::get('/item/trashed', 'CategoryController@trashed');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
