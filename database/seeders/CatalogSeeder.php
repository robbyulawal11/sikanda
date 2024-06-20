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
                'nama' => 'Mobil',
                'seller' => 'Katun',
                'harga' => 2000000,
                'deskripsi' => 'Mobil-mobilan',
                'wa' => '086738282728',
                'ig' => '@ujang123',
                'image' => '1718696802.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'nama' => 'Motor',
                'seller' => 'Asep',
                'harga' => 20000,
                'deskripsi' => 'Motor-motoran',
                'wa' => '086738282313',
                'ig' => '@asep456',
                'image' => '1718696858.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'nama' => 'Rumah',
                'seller' => 'Tatang',
                'harga' => 20000000,
                'deskripsi' => 'Gambar Rumah',
                'wa' => '086789738932',
                'ig' => '@tatang01',
                'image' => '1718698473.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'nama' => 'Motor Balap',
                'seller' => 'Budi',
                'harga' => 2000,
                'deskripsi' => 'Motor bohongan',
                'wa' => '083892332392',
                'ig' => '@budi123',
                'image' => '1718696989.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'nama' => 'Laptop',
                'seller' => 'Agus',
                'harga' => 1000,
                'deskripsi' => 'Laptop Mainan',
                'wa' => '089032318293',
                'ig' => '@budi123',
                'image' => '1718697065.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'nama' => 'Mainan',
                'seller' => 'Jajang',
                'harga' => 200000,
                'deskripsi' => 'Mainan Anak',
                'wa' => '083923942934',
                'ig' => '@jajang01',
                'image' => '1718697178.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}