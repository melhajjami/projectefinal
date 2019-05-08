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

Route::get('/', function () {
    return view('welcome');
});

Route::get('biblioteca', function () {
    return view('biblioteca');
});

Route::get('tenda', 'jocsController@index')->name('jocs.index');

Route::get('tenda', 'jocsController@index')->name('jocs.index');

Route::get('tenda/{joc}', 'jocsController@show')->name('jocs.show');

Route::get('perfil', 'userController@index')->name('user.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('prova', function() {
    return view('prova');
});

