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
                'produk' => 'buku/1718686021_b1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_buku' => 'Fabel Al-Quran',
                'harga' => '90000',
                'stok' => 20,
                'produk' => 'buku/1718686032_b2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_buku' => 'Dongeng Dunia',
                'harga' => '60000',
                'stok' => 7,
                'produk' => 'buku/1718686043_b3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_buku' => 'Nabi & Rasul',
                'harga' => '80000',
                'stok' => 12,
                'produk' => 'buku/1718686052_b4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_buku' => 'Dunia Peri',
                'harga' => '70000',
                'stok' => 9,
                'produk' => 'buku/1718686068_b5.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_buku' => 'Negeri Seribu',
                'harga' => '90000',
                'stok' => 34,
                'produk' => 'buku/1718686080_b6.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_buku' => 'Love Letter',
                'harga' => '50000',
                'stok' => 5,
                'produk' => 'buku/1718686089_b7.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_buku' => 'Nusantara',
                'harga' => '80000',
                'stok' => 11,
                'produk' => 'buku/1718686097_b8.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
