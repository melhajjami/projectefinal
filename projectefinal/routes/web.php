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

Route::get('/', 'bibliotecaController@index')->name('biblioteca.index')->middleware('auth');

Route::get('biblioteca', 'bibliotecaController@index')->name('biblioteca.index')->middleware('auth');

Route::get('tenda', 'jocsController@index')->name('jocs.index')->middleware('auth');

Route::get('tenda/{joc}', 'jocsController@show')->name('jocs.show')->middleware('auth');

Route::get('perfil/{id}', 'profileController@show')->name('perfil.show')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'profileController@edit'])->middleware('auth');

Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'profileController@update']);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->middleware('auth');

Route::post('comentaris/{id}', 'comentarisController@store')->name('comentaris.store')->middleware('auth');

Route::post('/search', 'searchController@show')->name('search.show')->middleware('auth');

Route::post('puntuacio/{id}', 'comentarisController@puntuar')->name('comentaris.puntuar')->middleware('auth');