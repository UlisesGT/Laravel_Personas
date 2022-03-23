<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function ()  {
    return view('pages.v_login');
});

Auth::routes();

Route::post('/validarlogin', [App\Http\Controllers\Auth\LoginController::class, 'validarlogin']);
Route::get('/LogOut', [App\Http\Controllers\Auth\LoginController::class, 'LogOut']);


//      Formulario
Route::get('/Personas', [App\Http\Controllers\PersonasController::class, 'Personas'])->name('Personas');
Route::post('/GuardarPersona', [App\Http\Controllers\PersonasController::class, 'GuardarPersona']);
Route::post('/EliminarPersona', [App\Http\Controllers\PersonasController::class, 'EliminarPersona']);


//      Reportes
Route::get('/Reportes', [App\Http\Controllers\PersonasController::class, 'Reportes'])->name('Reportes');
Route::post('/GuardarPersona', [App\Http\Controllers\PersonasController::class, 'GuardarPersona']);
Route::post('/EliminarPersona', [App\Http\Controllers\PersonasController::class, 'EliminarPersona']);


//      TOKEN
Route::post('/GetToken', [App\Http\Controllers\PersonasController::class, 'GetToken']);

//      REPORTE
Route::post('/GetRegistros', [App\Http\Controllers\PersonasController::class, 'GetRegistros']);
