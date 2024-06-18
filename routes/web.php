<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PembelianController;

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


Route::get('/', [BookController::class, 'showBooks'])->name('home');

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

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::post('/kategori/tambah', [KategoriController::class, 'store'])->name('tambahkategori');
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('editkategori');
    Route::put('/kategori/{id}/edit', [KategoriController::class, 'update'])->name('updatekategori');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('hapuskategori');


    
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/pembelian/{id}', [PembelianController::class, 'pembelian'])
    ->name('pembelian')
    ->middleware('auth');
