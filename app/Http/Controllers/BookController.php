<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
            $book->produk = $request->file('produk')->store('buku','public');
        }

        $book->save();

        return redirect()->route('data')->with('success', 'Data buku berhasil ditambahkan');
    }
    public function index () {
        $books = Book::all() ;
        return view('dashboard.data', compact('books'));
        }
    
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('dashboard.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        // Validate data
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
            // Delete old file
            if ($book->produk) {
                Storage::delete($book->produk);
            }
            // Store new file
            $book->produk = $request->file('produk')->store('buku','public');
        }

        $book->save();

        return redirect()->route('data')->with('success', 'Data buku berhasil diperbarui');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Delete associated file if exists
        if ($book->produk) {
            Storage::delete($book->produk);
        }

        $book->delete();

        return redirect()->route('data')->with('success', 'Data buku berhasil dihapus');
    }
}
