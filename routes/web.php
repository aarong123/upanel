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

    Route::group(['middleware' => ['Administrador']], function () {
        // rutas de roles
        Route::get('/rol', 'RolController@index');

        // rutas de usuarios
        Route::get('/user', 'UserController@index');
        Route::get('/user/create', 'UserController@create');
        Route::post('/user/register', 'UserController@store');
        Route::get('/user/edit/{person}', 'UserController@edit');
        Route::put('/user/update/{person}', 'UserController@update');
        Route::delete('/user/deactive/{person}', 'UserController@deactive');
        Route::delete('/user/active/{person}', 'UserController@active');

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

        // rutas de proveedores
        Route::get('/provider', 'ProviderController@index');
        Route::get('/provider/create', 'ProviderController@create');
        Route::post('/provider/register', 'ProviderController@store');
        Route::get('/provider/edit/{provider}', 'ProviderController@edit');
        Route::put('/provider/update/{provider}', 'ProviderController@update');
        Route::delete('/provider/deactive/{provider}', 'ProviderController@deactive');
        Route::delete('/provider/active/{provider}', 'ProviderController@active');

        // rutas de clientes
        Route::get('/client', 'ClientController@index');
        Route::get('/client/create', 'ClientController@create');
        Route::post('/client/register', 'ClientController@store');
        Route::get('/client/edit/{provider}', 'ClientController@edit');
        Route::put('/client/update/{provider}', 'ClientController@update');
        Route::delete('/client/deactive/{provider}', 'ClientController@deactive');
        Route::delete('/client/active/{provider}', 'ClientController@active');

        //rutas de compras
        Route::get('/entry', 'EntryController@index');
        Route::get('/entry/create', 'EntryController@create');
        Route::post('/entry/register', 'EntryController@store');
        Route::delete('/entry/deactive/{entry}', 'EntryController@deactive');


    });


    Route::group(['middleware' => ['Vendedor']], function () {
// rutas de client
        Route::get('/client', 'ClientController@index');
        Route::post('/client/register', 'ClientController@store');
        Route::put('/client/update', 'ClientController@update');
        Route::get('/client/selectClient', 'ClientController@selectClient');
    });
    Route::group(['middleware' => ['Almacenero']], function () {
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

        //proveedores
        Route::get('/provider', 'ProviderController@index');
        Route::get('/provider/create', 'ProviderController@create');
        Route::post('/provider/register', 'ProviderController@store');
        Route::get('/provider/edit/{provider}', 'ProviderController@edit');
        Route::put('/provider/update/{provider}', 'ProviderController@update');
        Route::delete('/provider/deactive/{provider}', 'ProviderController@deactive');
        Route::delete('/provider/active/{provider}', 'ProviderController@active');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
