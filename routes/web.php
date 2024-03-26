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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('/radicadas', [App\Http\Controllers\HomeController::class, 'radicadas'])->name('radicadas');
Route::get('/listadoquejas/{anio}', [App\Http\Controllers\HomeController::class, 'quejasAnio'])->name('listadoquejas');
Route::get('/radicadasVisitaduria', [App\Http\Controllers\HomeController::class, 'radicadasVisitaduria'])->name('radicadasVisitaduria');
Route::get('/listadoquejasvisitaduria/{anio}/{mes}/{idads}', [App\Http\Controllers\HomeController::class, 'quejasVisitaduria']);
Route::get('/radicadasMateria', [App\Http\Controllers\HomeController::class, 'radicadasMateria'])->name('radicadasMateria');
Route::get('/welcome/{anio}', [App\Http\Controllers\HomeController::class, 'welcome1'])->name('welcome1');
Route::get('/welcome/{anio}/{mes}', [App\Http\Controllers\HomeController::class, 'welcome2'])->name('welcome2');
Route::get('/welcome/{anio1}/{anio2}/{mes}', [App\Http\Controllers\HomeController::class, 'welcome3'])->name('welcome3');

Route::get('/radicadas/{anio1}/{anio2}', [App\Http\Controllers\HomeController::class, 'radicadas1'])->name('radicadas');

Route::get('/radicadasVisitaduria/{anio}/{mes}', [App\Http\Controllers\HomeController::class, 'radicadasVisitaduria1'])->name('radicadasVisitaduria1');
Route::get('/listadoquejasvisitaduria2/{anio}/{mes}/{idads}', [App\Http\Controllers\HomeController::class, 'listadoQuejasVisitaduria']);
Route::get('/radicadasMateria/{anio}/{mes}', [App\Http\Controllers\HomeController::class, 'radicadasMateria1'])->name('radicadasMateria1');
Route::get('/radicadasAutoridad/{anio}/{mes}', [App\Http\Controllers\HomeController::class, 'radicadasAutoridad'])->name('radicadasAutoridad');


Route::get('/tramite', [App\Http\Controllers\HomeController::class, 'tramite'])->name('tramite');
Route::get('/tramite/{anio1}/{mes1}/{opc}', [App\Http\Controllers\HomeController::class, 'tramite1']);
