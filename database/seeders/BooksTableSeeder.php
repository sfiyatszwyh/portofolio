<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('books')->insert([
            [
                'judul_buku' => 'Cerita Rakyat',
                'harga' => '50000',
                'stok' => 17,
                'produk' => 'b1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_buku' => 'Fabel Al-Quran',
                'harga' => '90000',
                'stok' => 20,
                'produk' => 'b2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_buku' => 'Dongeng Dunia',
                'harga' => '60000',
                'stok' => 7,
                'produk' => 'b3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_buku' => 'Nabi & Rasul',
                'harga' => '80000',
                'stok' => 12,
                'produk' => 'b4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_buku' => 'Dunia Peri',
                'harga' => '70000',
                'stok' => 9,
                'produk' => 'b5.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_buku' => 'Negeri Seribu',
                'harga' => '90000',
                'stok' => 34,
                'produk' => 'b6.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_buku' => 'Love Letter',
                'harga' => '50000',
                'stok' => 5,
                'produk' => 'b7.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_buku' => 'Nusantara',
                'harga' => '80000',
                'stok' => 11,
                'produk' => 'b8.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
