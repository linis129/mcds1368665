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


Route::get('codigo', function() {
	return view('codigo');
});

Route::post('codigo', 'UsuarioController@cargar');
// Usuarios
Route::resource('gestion_usuarios', 'UsuarioController');
Route::get('/gestion_usuarios/editarAjax/{UUID}', 'UsuarioController@editarAjax');

// Almacen
Route::resource('consulta_ambiente', 'AlmacenController');
Route::get('consulta_instructor', 'AlmacenController@consultaInstructor');

// Programas
Route::resource('gestion_programas', 'ProgramaController');
Route::get('gestion_programas/editarAjax/{UUID}', 'ProgramaController@editarAjax');

// Horarios
Route::resource('gestion_horario', 'HorarioController');
Route::get('gestion_horario/editarAjax/{UUID}', 'HorarioController@editarAjax');

// Ambiente
Route::resource('gestion_ambiente', 'AmbienteController');
Route::get('gestion_ambiente/editarAjax/{UUID}', 'AmbienteController@editarAjax');

// Instructor
Route::resource('gestion_instructor', 'InstructorController');
Route::get('gestion_instructor/editarAjax/{UUID}/{IdProg}/{IdHora}/{IdAmbi}', 'InstructorController@editarAjax');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('codigo', function() {
	return view('codigo');
});

Route::post('codigo', 'instructorController@cargar');

Route::get('pdf', 'AmbienteController@pdf');

Route::get('pdf2', 'InstructorController@pdf');

Route::get('pdf3', 'ProgramaController@pdf');