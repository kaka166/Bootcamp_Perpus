<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\UserController;

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
Route::group(['middleware' => ['auth','ceklevel:admin']], function (){
    
    Route::get('/buku', [BukuController::class, 'index']);
    Route::post('/buku/store', [BukuController::class, 'store']);
    Route::post('/buku/{id}/update', [BukuController::class, 'update']);
    Route::get('/buku/{id}/destroy', [BukuController::class, 'destroy']);

    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user/{id}/update', [UserController::class, 'update']);
    Route::get('/user/{id}/destroy', [UserController::class, 'destroy']);

    Route::get('/pinjam', [PinjamController::class, 'index']);
    Route::post('/pinjam/store', [PinjamController::class, 'store']);
    Route::post('/pinjam/{id}/update', [PinjamController::class, 'update']);
    Route::get('/pinjam/{id}/destroy', [PinjamController::class, 'destroy']);


    Route::get('/', [BerandaController::class, 'index']);
    Route::get('/dashboard', function () {
        return view('dashboard');
        });
    });

    Route::get('dashboard', ['buku_tersedia']);
    Route::get('/', [BerandaController::class, 'index']);
    Route::get('/dashboard', function () {
        return view('dashboard');
});

Route::group(['middleware' => ['auth','ceklevel:user,admin']], function (){
    Route::get('/pinjam_user', [PinjamController::class, 'show']);
    Route::post('/pinjam_user/store', [PinjamController::class, 'store']);

    Route::get('/', [BerandaController::class, 'index']);
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});



Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/postregister', [UserController::class, "register"])->name('postregister');

Route::post('/postlogin', [LoginController::class, "postlogin"])->name('postlogin');
Route::get('/logout', [LoginController::class, "logout"])->name('logout');