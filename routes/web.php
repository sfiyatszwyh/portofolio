<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('landingpage.home');
});
Route::group(["middleware" => ["auth", 'cekrole:admin']], function(){
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::get('/data', [BookController::class, 'index'])->name('data');

    Route::get('/tambah', function () {
        return view('dashboard.tambah');
    })->name('tambah');
   
    Route::post('/tambah', [BookController::class, 'store'])->name('book.store');

    Route::get('/edit/{id}', [BookController::class, 'edit'])->name('edit-book');
    Route::put('/update/{id}', [BookController::class, 'update'])->name('update-book');

    Route::delete('/delete/{id}', [BookController::class, 'destroy'])->name('delete-book');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', function () {
    return view('auth.register');
})->name('register');



