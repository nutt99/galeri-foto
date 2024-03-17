<?php

use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProfilController;
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
Route::get('/login', [LoginController::class, 'loginView']);
Route::post('/login', [LoginController::class, 'loginAction']);

//beranda guest
Route::get('/', [HomeController::class, 'berandaView']);
Route::get('/detail/{id}', [DetailController::class, 'detailFotoView']);

Route::get('/berandaJsonData', [HomeController::class, 'berandaJSON'])->name('getFotoDataJson');

//like action
Route::post('/detail/{id}/like', [DetailController::class, 'addLike'])->name('like.action');
Route::delete('/detail/{id}/unlike', [DetailController::class, 'unLike'])->name('unlike.action');

//add komentar
Route::post('/detail/{id}/komentar', [DetailController::class, 'addKomentar'])->name('addKomen.action');

//update deskripsi foto
Route::put('/updateFoto', [DetailController::class, 'editDeskripsi'])->name('editDeskripsi');

//logout
Route::get('/logout', [LoginController::class, 'logout']);

//register
Route::get('/registrasi', [LoginController::class, 'registerView']);
Route::post('/registrasi', [LoginController::class, 'registerPengguna']);

//home
Route::get('/dashboard', [HomeController::class, 'homeView']);

//profil
Route::get('/profil/{id}', [ProfilController::class, 'profileView']);
Route::put('/editUser', [ProfilController::class, 'editUser'])->name('editUser');

//detail album
Route::get('/album/{id_album}', [AlbumController::class, 'detailView']);
Route::delete('/album/{id_album}', [AlbumController::class, 'deleteFoto'])->name('deleteFoto.action');

//action di album
Route::post('/create-album', [AlbumController::class, 'mkDirrr']);
Route::post('/addPhoto', [AlbumController::class, 'upFoto']);
Route::post('/upDetail', [AlbumController::class, 'upFotoDetail'])->name('detailUp');

//album action
// Route::get('/getAlbumInfo', [AlbumController::class, 'getAlbumInfo'])->name('albuminfo');
Route::put('/editAlbum', [AlbumController::class, 'editAlbum'])->name('editAlbum');
Route::delete('/deleteAlbum', [AlbumController::class, 'deleteAlbum'])->name('deleteAlbum');

Route::get('/download/{id}', [DetailController::class, 'downloadFile']);

Route::get('/search', [HomeController::class, 'searchJSON'])->name('searchJSON');

Route::post('/search', [HomeController::class, 'searchView']);
Route::get('/searchData', [HomeController::class, 'searchDataJSON']);

//follow route

Route::post('/addFollow', [ProfilController::class, 'addFollow'])->name('addFollow');
Route::delete('/removeFollow', [ProfilController::class, 'removeFollow'])->name('removeFollow');




// Route::get('/ip',[HomeController::class, 'cekIp']);