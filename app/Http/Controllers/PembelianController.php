<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book; // Pastikan untuk mengimport model Book jika belum

class PembelianController extends Controller
{
    public function pembelian($id)
    {
        $book = Book::find($id);

        if (!$book) {
            abort(404); // Jika buku dengan ID yang diberikan tidak ditemukan, tampilkan error 404
        }

        return view('landingpage.pembelian', compact('book'));
    }
}
