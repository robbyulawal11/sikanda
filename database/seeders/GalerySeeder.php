<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GalerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('galeries')->insert([
            [
                'id' => 1,
                'gambar' => '1718956415.jpg',
                'deskripsi' => 'Toko kerajinan tangan',
                'author' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'gambar' => '1718956431.jpg',
                'deskripsi' => 'kerajinan batu',
                'author' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'gambar' => '1718956462.jpg',
                'deskripsi' => 'Toko kerajinan tangan 2',
                'author' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
