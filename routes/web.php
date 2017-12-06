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

Route::delete('/observaciones/destroy2/{id}/{paciente_id}','ObservacionController@destroy2')->name('observaciones.destroy2');
Route::resource('/admin','AdminController');
Route::get('/dietas/generarPdfDieta/{dieta_id}', 'DietaController@generarPdfDieta')->name('dietas.generarPdfDieta');
Route::get('/entrenamientos/generarPdfEntrenamiento/{entrenamiento_id}', 'EntrenamientoController@generarPdfEntrenamiento')->name('entrenamientos.generarPdfEntrenamiento');
Route::get('/menuAdmin', 'HomeController@index');
Route::get('/pacientes/indexPacientes', 'PacienteController@indexPacientes')->name('pacientes.indexPacientes');
Route::get('/pacientes/indexEntrenamientos/{id}', 'PacienteController@indexEntrenamientos')->name('pacientes.indexEntrenamientos');
Route::post('/pacientes/storeEntrenamiento/{id}', 'PacienteController@storeEntrenamiento')->name('pacientes.storeEntrenamiento');
Route::get('/pacientes/createEntrenamiento/{id}', 'PacienteController@createEntrenamiento')->name('pacientes.createEntrenamiento');
Route::get('/pacientes/indexDietas/{id}', 'PacienteController@indexDietas')->name('pacientes.indexDietas');
Route::post('/pacientes/storeDieta/{id}', 'PacienteController@storeDieta')->name('pacientes.storeDieta');
Route::get('/pacientes/createDieta/{id}', 'PacienteController@createDieta')->name('pacientes.createDieta');
Route::get('/pacientes/showDatos/{id}', 'PacienteController@showDatos')->name('pacientes.showDatos');
Route::get('/pacientes/showPacienteObservacion/{id}', 'PacienteController@showPacienteObservacion')->name('pacientes.showPacienteObservacion');
Route::get('/pacientes/showObservaciones/{id}', 'PacienteController@showObservaciones')->name('pacientes.showObservaciones');
Route::get('/pacientes/createObservacion/{id}', 'PacienteController@createObservacion')->name('pacientes.createObservacion');
Route::post('/pacientes/storeObservacion/{id}', 'PacienteController@storeObservacion')->name('pacientes.storeObservacion');
Route::resource('/dietas','DietaController');
Route::resource('/entrenamientos','EntrenamientoController');
Route::resource('/ejercicios','EjercicioController');
Route::resource('/alimentos','AlimentoController');
Route::resource('/pacientes','PacienteController');
Route::resource('/observaciones','ObservacionController');
Route::get('/', function () {    return view('auth/login'); });
Auth::routes();
Route::get('/menu', 'HomeController@index');
Route::get('/home', 'HomeController@index');


