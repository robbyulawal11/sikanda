<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                'id' => 1,
                'title' => 'Peresmian Galeri Dekranasda',
                'image' => '',
                'author' => 'Budi Haryanto',
                'slug' => 'peresmian-galeri-dekranasda',
                'body' => '<p>Penjabat Ketua Dekranasda Kota Sukabumi, Diana Rahesti, menjelaskan bahwa Galeri Dekranasda berfungsi sebagai media pemasaran berbagai produk unggulan yang dihasilkan oleh para pengrajin binaan Dekranasda.</p><br>
                            <p>“Galeri Dekranasda menjadi etalase produk unggulan yang diharapkan bisa menarik wisatawan lokal hingga mancanegara. Meningkatkan PAD dan memacu semangat para pengrajin untuk terus berkreasi, sehingga kesejahteraan pelaku IKM dan UKM meningkat, dan warisan budaya leluhur kita tetap lestari," kata Diana, Selasa (28/5/2024).</p>',
                'id_user' => '123',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'title' => 'PJ Wali Kota Sukabumi Buka Galeri Dekranasda',
                'image' => '',
                'author' => 'Didin Komarudin',
                'slug' => 'pj-wali-kota-sukabumi-buka-galeri-dekranasda',
                'body' => '<p>Menyambut pembukaan galeri, Penjabat Wali Kota Sukabumi, Kusmana Hartadji, mengungkapkan kegembiraannya. “Hari ini merupakan hari yang monumental karena setelah sekian lama, Dekranasda kembali memiliki galeri. Ini merupakan bukti nyata komitmen kita dalam mendukung pengrajin lokal,” ujarnya, pada Sabtu (25/05).</p><br>
                            <p>Galeri Dekranasda bukan hanya sekadar ruang pameran, melainkan juga menjadi simbol dari dedikasi dan kerja keras para pengrajin lokal. “Kerajinan tangan adalah aset budaya yang harus kita lestarikan dan kembangkan. Melalui galeri ini, kita tidak hanya mempromosikan produk lokal, tetapi juga menginspirasi generasi muda untuk melestarikan dan mengembangkan kerajinan tangan dengan sentuhan kreativitas yang modern,” tambahnya.</p>',
                'id_user' => '124',
                'created_at' => now(),
                'updated_at' => now()            ],
            [
                'id' => 3,
                'title' => 'Halalbihalal Dekranasda Kota Sukabumi',
                'image' => '',
                'author' => 'H. Komeng',
                'slug' => 'halalbihalal-dekranasda-kota-sukabumi',
                'body' => '<p>Penjabat Ketua Dekranasda Kota Sukabumi, Diana Rahesti, menjelaskan bahwa Galeri Dekranasda berfungsi sebagai media pemasaran berbagai produk unggulan yang dihasilkan oleh para pengrajin binaan Dekranasda.</p><br>
                            <p>“Galeri Dekranasda menjadi etalase produk unggulan yang diharapkan bisa menarik wisatawan lokal hingga mancanegara. Meningkatkan PAD dan memacu semangat para pengrajin untuk terus berkreasi, sehingga kesejahteraan pelaku IKM dan UKM meningkat, dan warisan budaya leluhur kita tetap lestari," kata Diana, Selasa (28/5/2024).</p>',
                'id_user' => '125',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'title' => 'Program Dekranasda Kota Sukabumi Dikalim Membaik',
                'image' => '',
                'author' => 'Gugun Blues',
                'slug' => 'program-dekranasda-kota-sukabumi-diklaim-membaik',
                'body' => '<p>Penjabat (Pj) Ketua Dewan Kerajinan Nasional Daerah (Dekranasda) Kota Sukabumi Diana Rahesti mengikuti Rapat Kerja Daerah (Rakerda) Dekranasda Provinsi Jabar tahun 2023 di Hotel Savoy Homan Kota Bandung, Jumat (8/12).</p><br>
                            <p>Rakerda tersebut dalam rangka evaluasi Program Kerja tahun 2023 dan pembahasan program kerja tahun 2024, sesuai dengan AD/ART Dekranas tahun 2020.</p>',
                'id_user' => '126',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'title' => 'Peresmian Galeri Dekranasda',
                'image' => '',
                'author' => 'Bambang Sudibyo',
                'slug' => 'peresmian-galeri-dekranasda',
                'body' => '<p>Penjabat Ketua Dekranasda Kota Sukabumi, Diana Rahesti, menjelaskan bahwa Galeri Dekranasda berfungsi sebagai media pemasaran berbagai produk unggulan yang dihasilkan oleh para pengrajin binaan Dekranasda.</p><br>
                            <p>“Galeri Dekranasda menjadi etalase produk unggulan yang diharapkan bisa menarik wisatawan lokal hingga mancanegara. Meningkatkan PAD dan memacu semangat para pengrajin untuk terus berkreasi, sehingga kesejahteraan pelaku IKM dan UKM meningkat, dan warisan budaya leluhur kita tetap lestari," kata Diana, Selasa (28/5/2024).</p>',
                'id_user' => '127',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'title' => 'Pengurus Dekranasda Kota Sukabumi Masa Bakti 2023 – 2024',
                'image' => '',
                'author' => 'Cecep K.',
                'slug' => 'pengurus-dekranasda-kota-sukabumi-masa-bakti-2023-2024',
                'body' => '<p>Penjabat Wali Kota, Kusmana Hartadji, beserta Asisten Bidang Pemerintahan dan Kesra Sekretariat Daerah, Andri Firmansyah menghadiri pengukuhan pengurus Dewan Kerajinan Nasional (Dekranasda) Kota Sukabumi masa bakti 2023 – 2024.</p><br>
                            <p>Sebanyak 38 orang pengurus Dekranasda Kota Sukabumi masa bakti 2023 – 2024 resmi dikukuhkan oleh Penjabat Ketua Dekranasda Kota Sukabumi, Diana Rahesti, Jumat (24/11/2023) di Hotel Anugrah.</p>',
                'id_user' => '128',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 7,
                'title' => 'Dekranasda Sukabumi promosikan produk kerajinan tangan ke pasar internasional',
                'image' => '',
                'author' => 'Mahmud Ganteng',
                'slug' => 'dekranasda-sukabumi-promosikan-produk-kerajinan-tangan-ke-pasar-internasional',
                'body' => '<p>Dewan Kerajinan Nasional Daerah (Dekranasda) Kabupaten Sukabumi mempromosikan berbagai produk kerajinan tangan hasil karya pelaku usaha mikro kecil dan menengah (UMKM) Kabupaten Sukabumi, Jawa Barat hingga ke pasar internasional.</p><br>
                            <p>"Promosi yang kami lakukan ini bertujuan untuk membantu memasarkan produk kerajinan khas Kabupaten Sukabumi agar lebih dikenal baik di tingkat nasional hingga internasional," kata Ketua Dekranasda Kabupaten Sukabumi Yani Jatnika di Sukabumi, Minggu.</p>',
                'id_user' => '128',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
