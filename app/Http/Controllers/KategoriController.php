<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index()
    {
        // Ambil data kategori dari database
        $kategoris = Kategori::all();
        return view('dashboard.kategori', compact('kategoris'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'namaKategori' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Kategori::create([
            'nama' => $request->namaKategori,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('dashboard.editkategori', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaKategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama' => $request->namaKategori,
        ]);

        return redirect()->route('kategori')->with('success', 'Kategori berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}

