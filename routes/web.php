<?php

use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
/*
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


//login
Route::get('/', [LoginController::class, 'loginView']);
Route::post('/', [LoginController::class, 'loginAction']);

//logout
Route::get('/logout', [LoginController::class, 'logout']);

//register
Route::get('/registrasi', [LoginController::class, 'registerView']);
Route::post('/registrasi', [LoginController::class, 'registerPengguna']);

//home
Route::get('/home', [HomeController::class, 'homeView']);

//detail album
Route::get('/album/{id_album}', [AlbumController::class, 'detailView']);
