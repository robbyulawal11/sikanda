<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('catalogs')->insert([
            [
                'id' => 1,
                'nama' => 'Gelang',
                'seller' => 'Katun',
                'harga' => 2000000,
                'deskripsi' => 'Kerajinan gelang dari sukabumi',
                'wa' => '86738282728',
                'ig' => 'ujang123',
                'image' => 'IMG_8204.jpg',
                'user_id' => 1,
                'user_alamat' => 'Jalan Raya Sukabumi 12',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'nama' => 'Kerajinan Batu 2',
                'seller' => 'Asep',
                'harga' => 20000,
                'deskripsi' => 'Kerajinan Batu dari sukabumi',
                'wa' => '86738282313',
                'ig' => 'asep456',
                'image' => 'IMG_8211.jpg',
                'user_id' => 1,
                'user_alamat' => 'Jalan Raya Sukabumi 12',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'nama' => 'Kerajinan Batu Kristal',
                'seller' => 'Tatang',
                'harga' => 20000000,
                'deskripsi' => 'Kerajinan Batu Bening Dari Sukabumi',
                'wa' => '86789738932',
                'ig' => 'tatang01',
                'image' => 'IMG_8216.jpg',
                'user_id' => 1,
                'user_alamat' => 'Jalan Raya Sukabumi 12',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'nama' => 'Gelang',
                'seller' => 'Budi',
                'harga' => 2000,
                'deskripsi' => 'Gelang cantik dari sukabumi',
                'wa' => '83892332392',
                'ig' => 'budi123',
                'image' => 'IMG_8220.jpg',
                'user_id' => 1,
                'user_alamat' => 'Jalan Raya Sukabumi 12',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'nama' => 'Batu Kristal Bening',
                'seller' => 'Agus',
                'harga' => 1000,
                'deskripsi' => 'Kerajinan Batu Kristal Bening Dari Sukabumi',
                'wa' => '89032318293',
                'ig' => 'budi123',
                'image' => 'IMG_8226.jpg',
                'user_id' => 2,
                'user_alamat' => 'Jalan Raya Sukabumi 12',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'nama' => 'Ornamen',
                'seller' => 'Jajang',
                'harga' => 200000,
                'deskripsi' => 'Kerajinan Ornamen dari Sukabumi',
                'wa' => '83923942934',
                'ig' => 'jajang01',
                'image' => 'IMG_8235.jpg',
                'user_id' => 2,
                'user_alamat' => 'Jalan Raya Sukabumi 12',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
