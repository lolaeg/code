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
//Poner las acciones definidas por el programador antes del CRUD por defecto que monta Laravel
Route::delete('especialidades/destroyAll', 'EspecialidadController@destroyAll')->name('especialidades.destroyAll');
//LLAMA AL METODO DESTROYALL DE ESPECIALIDADES
Route::resource('especialidades', 'EspecialidadController');
//SIGNIFICA UN CRUD DE UNA ENTIEDAD CONCRETA, MEDICOS, CITAS, ESPECIALIDADES TE LLEVE A LOS CONTROLADORES

Route::resource('medicos', 'MedicoController');
Route::resource('pacientes', 'PacienteController');


Route::resource('citas', 'CitaController');





Auth::routes();

Route::get('/home', 'HomeController@index');


