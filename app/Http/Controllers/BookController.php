<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function showBooks()
    {
        $books = Book::all();
        return view('landingpage.home', compact('books'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'judul_buku' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'produk' => 'required|file|max:1024',
        ]);
        
        // Simpan data buku
        $book = new Book();
        $book->judul_buku = $request->judul_buku;
        $book->harga = $request->harga;
        $book->stok = $request->stok;

        if ($request->hasFile('produk')) {
            $filename = time() . '_' . $request->file('produk')->getClientOriginalName();
            $request->file('produk')->move(public_path('buku'), $filename);
            $book->produk = 'buku/' . $filename;
        }

        $book->save();

        return redirect()->route('data')->with('success', 'Data buku berhasil ditambahkan');
    }

    public function index()
    {
        $books = Book::all();
        return view('dashboard.data', compact('books'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('dashboard.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'judul_buku' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'produk' => 'nullable|file|max:1024',
        ]);

        // Update data
        $book = Book::findOrFail($id);
        $book->judul_buku = $request->judul_buku;
        $book->harga = $request->harga;
        $book->stok = $request->stok;

        if ($request->hasFile('produk')) {
            // Hapus file lama
            if ($book->produk && file_exists(public_path($book->produk))) {
                unlink(public_path($book->produk));
            }
            // Simpan file baru
            $filename = time() . '_' . $request->file('produk')->getClientOriginalName();
            $request->file('produk')->move(public_path('buku'), $filename);
            $book->produk = 'buku/' . $filename;
        }

        $book->save();

        return redirect()->route('data')->with('success', 'Data buku berhasil diperbarui');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Hapus file terkait jika ada
        if ($book->produk && file_exists(public_path($book->produk))) {
            unlink(public_path($book->produk));
        }

        $book->delete();

        return redirect()->route('data')->with('success', 'Data buku berhasil dihapus');
    }
}
