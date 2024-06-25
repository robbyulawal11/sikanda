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
                'image' => 'article01.jpg',
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
                'image' => 'article02.jpg',
                'author' => 'Didin Komarudin',
                'slug' => 'pj-wali-kota-sukabumi-buka-galeri-dekranasda',
                'body' => '<p>Menyambut pembukaan galeri, Penjabat Wali Kota Sukabumi, Kusmana Hartadji, mengungkapkan kegembiraannya. “Hari ini merupakan hari yang monumental karena setelah sekian lama, Dekranasda kembali memiliki galeri. Ini merupakan bukti nyata komitmen kita dalam mendukung pengrajin lokal,” ujarnya, pada Sabtu (25/05).</p><br>
                            <p>Galeri Dekranasda bukan hanya sekadar ruang pameran, melainkan juga menjadi simbol dari dedikasi dan kerja keras para pengrajin lokal. “Kerajinan tangan adalah aset budaya yang harus kita lestarikan dan kembangkan. Melalui galeri ini, kita tidak hanya mempromosikan produk lokal, tetapi juga menginspirasi generasi muda untuk melestarikan dan mengembangkan kerajinan tangan dengan sentuhan kreativitas yang modern,” tambahnya.</p>',
                'id_user' => '124',
                'created_at' => now(),
                'updated_at' => now()            
            ],
            [
                'id' => 3,
                'title' => 'Halalbihalal Dekranasda Kota Sukabumi',
                'image' => 'article03.jpg',
                'author' => 'H. Komeng',
                'slug' => 'halalbihalal-dekranasda-kota-sukabumi',
                'body' => '<p>Dekranasda Kota Sukabumi menggelar acara Halalbihalal Idulfitri 1445 H dan Penyerahan Penghargaan Lomba Desain Batik Kota Sukabumi Tahun 2024 pada Selasa, 30 April 2024 di Sekretariat Dekranasda Kota Sukabumi.</p><br>
                            <p>Acara ini dihadiri oleh Penjabat Wali Kota Sukabumi, Kusmana Hartadji, Ketua Dekranasda Kota Sukabumi, Diana Rahesti, para pengurus Dekranasda, dan beberapa pengrajin batik Kota Sukabumi.</p><br>
                            <p>Dalam sambutannya, Ketua Harian Dekranasda Kota Sukabumi, Agus Wawan Gunawan, menyampaikan rencana Dekranasda untuk mengikuti pameran di Solo yang diinisiasi oleh Dekranasda Jawa Barat.</p>',
                'id_user' => '125',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'title' => 'Program Dekranasda Kota Sukabumi Diklaim Membaik',
                'image' => 'article04.jpg',
                'author' => 'Mahmud Ganteng',
                'slug' => 'program-dekranasda-kota-sukabumi-diklaim-membaik',
                'body' => '<p>Penjabat (Pj) Ketua Dewan Kerajinan Nasional Daerah (Dekranasda) Kota Sukabumi Diana Rahesti mengikuti Rapat Kerja Daerah (Rakerda) Dekranasda Provinsi Jabar tahun 2023 di Hotel Savoy Homan Kota Bandung, Jumat (8/12).</p><br>
                            <p>Rakerda tersebut dalam rangka evaluasi Program Kerja tahun 2023 dan pembahasan program kerja tahun 2024, sesuai dengan AD/ART Dekranas tahun 2020.</p>',
                'id_user' => '132',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'title' => 'Ketua Dekranasda Kota Sukabumi Hadiri Puncak HUT Ke-44 Dekranas',
                'image' => 'article05.jpg',
                'author' => 'Bambang Sudibyo',
                'slug' => 'ketua-dekranasda-kota-sukabumi-hadiri-puncak-hut-ke-44-dekranas',
                'body' => '<p>Ketua Ketua Dewan Kerajinan Nasioanl Daerah (Dekranasda) Kota Sukabumi, sekaligus Ketua Tim Penggerak PKK Kota Sukabumi, Diana Rahesti, menghadiri Puncak Syukuran acara HUT Ke-44 Dekranas dan HKG Ke-52 PKK yang bertempat di Hotel Alila, Kota Surakarta, Rabu, (15 /5/2024)</p><br>
                        <p>Acara ini dihadiri oleh berbagai tamu terhormat, termasuk Ibu Negara Hj. Iriana Joko Widodo, Ketua Dekranas Hj. Wury Ma’ruf Amin, OASE Kabinet Indonesia Maju, Ketua Dekranasda Provinsi Jawa Barat, dan Ketua Dekranasda Kabupaten dan Kota.</p><br>
                        <p>HUT Ke-44 Dekranas merupakan perayaan ulang tahun Dewan Kerajinan Nasional (Dekranas), sebuah lembaga yang berfokus pada pengembangan industri kerajinan tradisional di Indonesia.</p>',
                'id_user' => '126',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'title' => 'Berhadiah Jutaan Rupiah, Yuk Ikuti Lomba HUT ke-110 Kota Sukabumi',
                'image' => 'article06.jpg',
                'author' => 'Kang Maman',
                'slug' => 'berhadiah-jutaan-rupiah-yuk-ikuti-lomba-hut-ke-110-kota-sukabumi',
                'body' => '<p>Dewan Kerajinan Nasional Daerah (Dekranasda) Kota Sukabumi menyelenggarakan lomba desain batik dalam rangka HUT ke 110 Kota Sukabumi tahun ini. Lomba ini memperebutkan hadiah uang tunai jutaan rupiah.</p><br>
                        <p>Lomba diselenggarakan dengan tema ‘Motif Batik Kearifan Lokal Kota Sukabumi’. Selain uang tunai, lomba juga memperebutkan piala Wali Kota Sukabumi, piala dan piagam Dekranasda Kota Sukabumi, beasiswa pembatikan hingga penjualan dari Batik Factral, juga ada bingkisan menarik.</p><br>
                        <p>Ada pun persyaratan calon peserta lomba yakni bersifat perorangan, desain harus orsinil dan bukan tiruan dari desain batik lain.</p>',
                'id_user' => '127',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 7,
                'title' => 'Bangkitkan Ekonomi Daerah, ASN Kota Sukabumi Diimbau Gunakan Produk UMKM melalui Dekranasda',
                'image' => 'article07.jpg',
                'author' => 'Teh Nina',
                'slug' => 'bangkitkan-ekonomi-daerah-asn-kota-sukabumi-diimbau-gunakan-produk-umkm-melalui-dekranasda',
                'body' => '<p>Penjabat Wali Kota Sukabumi Kusmana Hartadji mengimbau seluruh aparatur sipil negara (ASN) yang bertugas di lingkungan Pemerintah Kota Sukabumi untuk senantiasa menggunakan dan membeli produk usaha mikro, kecil dan menengah (UMKM) buatan anak bangsa khususnya putra daerah.</p><br>
                        <p>“Kita harus bangga menggunakan berbagai produk UMKM khususnya khas Kota Sukabumi sebagai jati diri dan kebanggaan terhadap daerah dan negara,” katanya di Sukabumi, Selasa (4/6/2024) lalu.</p><br>
                        <p>Menurut Kusmana, dengan membeli produk-produk UMKM tentunya sangat membantu para pelaku usaha sehingga pendapatannya terus meningkat serta turut membangkitkan dan meningkatkan perekonomian daerah.</p>',
                'id_user' => '128',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 8,
                'title' => 'Kunjungan Kerja Ketua Beserta Pengurus Dekranasda Kabupaten Sukabumi',
                'image' => 'article08.jpg',
                'author' => 'Mbak Yul',
                'slug' => 'kunjungan-kerja-ketua-beserta-pengurus-dekranasda-kabupaten-sukabumi',
                'body' => '<p>Bupati Purwakarta Ambu Anne Ratna Mustika menghadiri sekaligus menerima Kunjungan Kerja Ketua beserta Pengurus Dewan Kerajinan Nasional Daerah (Dekranasda) Kabupaten Sukabumi, bertempat di Bale Paseban (Pendopo Purwakarta).</p><br>
                            <p>Dewan Kerajinan Nasional Daerah (Dekranasda) adalah organisasi nirlaba yang menghimpun pecinta dan peminat seni untuk memayungi, mengembangkan produk kerajinan dan mengembangkan usaha, serta berupaya untuk meningkatkan kehidupan pelaku bisnisnya yang sebagian besar merupakan kelompok Usaha Kecil dan Menengah (UKM) atau Industri Kecil dan Menengah (IKM). </p>',
                'id_user' => '129',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 9,
                'title' => 'Bincang NAMA Talk: Dorong Kreativitas Batik untuk Identitas Kota Sukabumi',
                'image' => 'article09.jpg',
                'author' => 'Mamang Kidal',
                'slug' => 'bincang-nama-talk-dorong-kreativitas-batik-untuk-identitas-kota-sukabumi',
                'body' => '<p>Penjabat (PJ) Ketua Dekranasda Kota Sukabumi Diana Rahesti, menghadiri acara <b><i>NAMA TALK with “DEKRANASDA KOTA SUKABUMI”</b></i> yang bertema Lomba Desain Batik dalam rangka HUT Kota Sukabumi tahun 2024 di Nama Coffe, Senin (5/2/2024).</p><br>
                        <p>Acara tersebut bertujuan untuk mensosialisasikan kegiatan " Lomba Batik " yang akan dilakukan oleh Dekranasda Kota Sukabumi. Dalam Talkshow disampaikan materi sesuai dengan bidang yang digeluti berkaitan dengan tema yang diberikan.</p>',
                'id_user' => '130',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 10,
                'title' => 'Pengurus Dekranasda Kota Sukabumi Masa Bakti 2023 – 2024',
                'image' => 'article10.jpg',
                'author' => 'Cecep K.',
                'slug' => 'pengurus-dekranasda-kota-sukabumi-masa-bakti-2023-2024',
                'body' => '<p>Penjabat Wali Kota, Kusmana Hartadji, beserta Asisten Bidang Pemerintahan dan Kesra Sekretariat Daerah, Andri Firmansyah menghadiri pengukuhan pengurus Dewan Kerajinan Nasional (Dekranasda) Kota Sukabumi masa bakti 2023 – 2024.</p><br>
                            <p>Sebanyak 38 orang pengurus Dekranasda Kota Sukabumi masa bakti 2023 – 2024 resmi dikukuhkan oleh Penjabat Ketua Dekranasda Kota Sukabumi, Diana Rahesti, Jumat (24/11/2023) di Hotel Anugrah.</p>',
                'id_user' => '131',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 11,
                'title' => 'Dekranasda Sukabumi promosikan produk kerajinan tangan ke pasar internasional',
                'image' => 'article11.jpg',
                'author' => 'Mahmud Ganteng',
                'slug' => 'dekranasda-sukabumi-promosikan-produk-kerajinan-tangan-ke-pasar-internasional',
                'body' => '<p>Dewan Kerajinan Nasional Daerah (Dekranasda) Kabupaten Sukabumi mempromosikan berbagai produk kerajinan tangan hasil karya pelaku usaha mikro kecil dan menengah (UMKM) Kabupaten Sukabumi, Jawa Barat hingga ke pasar internasional.</p><br>
                            <p>"Promosi yang kami lakukan ini bertujuan untuk membantu memasarkan produk kerajinan khas Kabupaten Sukabumi agar lebih dikenal baik di tingkat nasional hingga internasional," kata Ketua Dekranasda Kabupaten Sukabumi Yani Jatnika di Sukabumi, Minggu.</p>',
                'id_user' => '132',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
