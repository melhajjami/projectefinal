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
use App\User;
use Illuminate\Support\Facades\Input;

Route::get('/', 'bibliotecaController@index')->name('biblioteca.index')->middleware('auth');

Route::get('biblioteca', 'bibliotecaController@index')->name('biblioteca.index')->middleware('auth');

Route::get('tenda', 'jocsController@index')->name('jocs.index')->middleware('auth');

Route::get('tenda/{joc}', 'jocsController@show')->name('jocs.show')->middleware('auth');

Route::get('perfil/{id}', 'profileController@show')->name('perfil.show')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('prova', function() {
    return view('prova');
});

Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'profileController@edit']);

Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'profileController@update']);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('comentaris/{id}', 'comentarisController@store')->name('comentaris.store');

Route::any( '/search', function () {
    $q = Input::get('q');
    $user = User::where( 'nickname', 'LIKE', '%' . $q . '%' )->get ();
    $joc = joc::where( 'nom'. 'LIKE', '%', $q . '%')->get();
    
    if (count ( $user ) > 0)
        return view ( 'search' )->withDetails( $user )->withQuery ( $q );
    else
        return view ( 'search' )->withMessage ( 'No Details found. Try to search again !' );
} );