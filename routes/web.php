<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\UsuariosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('usuarios', UsuariosController::class);
Route::resource('publicacion', PublicacionController::class);
// Route::get('/publicacion/intermedia/{post-id}', 'PublicacionController@intermedia')->name('publicacion.intermedia');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
