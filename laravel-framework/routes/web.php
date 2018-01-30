<?php
use Illuminate\Support\Facades\Auth;
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
Auth::routes();


Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['web','auth']], function () {
	Route::resource('pacientes','UsuarioController');
	Route::resource('consultas','ConsultaController');
});


//Route::get('/home', 'HomeController@index')->name('home');
