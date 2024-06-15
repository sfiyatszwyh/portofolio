<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategorisTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('kategoris')->insert([
            [
                'nama' => 'Character Building',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Story telling',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Stories & Coloring',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pengantar Tidur Anak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
