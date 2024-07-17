<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'namaKategori' => 'Kirab Budaya',
                'descKategori' => 'Memperingati hari jadi Kota Sukabumi',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'namaKategori' => 'Kerajinan Tangan Batu',
                'descKategori' => 'Kerajinan tangan yang terbuat dari batu',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'namaKategori' => 'Event Peringatan Hari Kemerdekaan',
                'descKategori' => 'Kegiatan untuk memperingati hari kemerdekaan Indonesia',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
