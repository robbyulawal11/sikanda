<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = \App\Models\User::create([
        [
            'nama' => 'Admin',
            'email' => 'admin@sikanda.store',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'wa' => '',
            'alamat' => '',
            'image' => '',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'nama' => 'Ahmad Subagyo',
            'email' => 'subagyo123@gmail.com',
            'password' => Hash::make('subagyo123'),
            'role' => 'Penjual',
            'wa' => '+6287623674532',
            'alamat' => 'Jalan Sukabumi Nomor 12 RT 03 RW 01 Desa Sukatani Kecamatan Tanah Tinggi',
            'image' => '1719296430.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'nama' => 'Putri Suhartini',
            'email' => 'putri123@gmail.com',
            'password' => Hash::make('putri123'),
            'role' => 'Copywriter',
            'wa' => '+6287972832182',
            'alamat' => 'Jalan Sukabumi Nomor 20 RT 01 RW 10 Desa Sukabuah Kecamatan Bukit Tinggi',
            'image' => '1719296507.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]
        ]);
    }
}
