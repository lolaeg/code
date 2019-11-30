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
    //SOLO LO QUE QUIERO VER UNCA INFROMACIÓN DE LOS USUARIOS
    //ESTA DEVULVE LA VISTA WELCOME
});

Route::resource('especialidades', 'EspecialidadController');

Route::resource('medicos', 'MedicoController');
Route::resource('pacientes', 'PacienteController');
Route::resource('enfermedades', 'EnfermedadController');


Route::resource('citas', 'CitaController');

Route::resource('consultas', 'ConsultaController');





Auth::routes();

Route::get('/home', 'HomeController@index');


