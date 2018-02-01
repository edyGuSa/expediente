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
    return redirect('home');
});

Route::group(['middleware' => ['web','auth']], function () {
	Route::resource('pacientes','UsuarioController');
	
	Route::resource('consultas','ConsultaController');
	
	Route::get('consultas/ver/{user}','ConsultaController@getExpediente')->name('ver_expediente');

	Route::get('consultas/get/data/{user}','ConsultaController@getChartData')->name('chart_data');
	
	Route::post('consultas/store/{id_user}','ConsultaController@storeConsulta')->name('storeConsulta');
	
	Route::get('home',function(){
		return view('home');
	});
});


//Route::get('/home', 'HomeController@index')->name('home');
