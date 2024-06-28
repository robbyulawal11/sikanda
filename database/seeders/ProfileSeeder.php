<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            [
                'id' => 1,
                'gambarHero' => "hero.jpg",
                'gambarAbout' => "about.jpeg",
                'gambarStrukturOrganisasi' => "strukturOrganisasi.jpg",
                'videoYoutube' => "https://www.youtube.com/embed/ozm4V1L5rPg?si=LxQS_LgNMs0JAIVK",
                'tentang' => '<p>Dewan Kerajinan Nasional (DEKRANAS) adalah organisasi nirlaba yang menghimpun pencinta dan peminat seni untuk memayungi dan mengembangkan produk kerajinan dan mengembangkan usaha tersebut, serta berupaya meningkatkan kehidupan pelaku bisnisnya, yang sebagian merupakan kelompok usaha kecil dan menengah (UKM).</p>',
                'sejarah' => '<p><span style="color: rgb(84, 84, 84); background-color: rgb(255, 255, 255);">Kerajinan sebagai suatu perwujudan perpaduan ketrampilan untuk menciptakan suatu karya dan nilai keindahan merupakan bagian yang tidak terpisahkan dan suatu kebudayaan. Kerajinan tersebut tumbuh melalui proses waktu berabad-abad. Tumbuh berkembangnya maupun laju dan merananya kerajinan sebagai warisan yang turun temurun tergantung oleh beberapa faktor.&nbsp;</span></p><p><br></p><p><span style="color: rgb(84, 84, 84); background-color: rgb(255, 255, 255);">Di antara faktor-faktor yang berpengaruh adalah transformasi masyarakat yang disebabkan oleh teknologl yang semakln modern, minat dan penghargaan masyarakat terhadap barang kerajinan dan tetap mumpuninya para perajin itu sendiri baik dalam menjaga mutu dan kreativitas maupun dalam penyediaan produk kerajinan secara berkelanjutan.</span></p><p><br></p><p><span style="color: rgb(84, 84, 84); background-color: rgb(255, 255, 255);">Bangsa Indonesia dikaruniai Tuhan Yang Maha Esa dengan keanekaragaman kekayaan khasanah budaya dan limpahan kekayaan alam yang dapat dlolah untuk mengungkapkan ketinggian nilai-nilai budaya tersebut dalam bentuk barang kerajinan. Hamparan pulau pulau Nusantara ini telah tumbuh dan mentradisi akan kerajinan yang beraneka ragam, ibarat indahnya hamparan bunga setaman yang berwarna-warni.&nbsp;</span></p><p><br></p><p><span style="color: rgb(84, 84, 84); background-color: rgb(255, 255, 255);">Dari ukiran kayu Asmat di ujung timur hingga sulaman kain Aceh di ujung barat. Dari barang kerajinan kerang Halmahera di ujung utara hingga ukiran kayu cendana pulau di Timur di ujung selatan dari Nusantara yang indah ini.</span></p><p><br></p><p><span style="color: rgb(84, 84, 84); background-color: rgb(255, 255, 255);">Bahkan di sela sela batas wilayah tersebut masth terdapat banyak aneka kerajinan yang kharismatis seperti kain tenun songket Sumatera Barat, kain tapis Lampung, keramik gerabah, wayang golek, topeng kayu Jawa Barat, wayang kulit, batik, kerajinan perak dari Jawa Tengah dan Yogyakarta, berbagai anyaman dari seluruh Pulau Jawa dan berbagai patung kayu Bali, ukiran kayu dan peralatan perang jaman kerajaan tempo dulu di Madura, tenun ikat Sulawesi Selatan dan lain sebagainya.</span></p><p><br></p><p><span style="color: rgb(84, 84, 84); background-color: rgb(255, 255, 255);">Melalui tahapan pembangunan (Repelita) bangsa Indonesia telah berhasil meningkatkan taraf kesejahteraannya meskipun kondlsmya belum merata dan optimal.</span></p><p><br></p><p><span style="color: rgb(84, 84, 84); background-color: rgb(255, 255, 255);">Untuk mencapai itu semua telah diperlukan teknologi dan penopang penopang modern lain. Masuknya arus teknologi dan sistem kerja baru telah menimbulkan berbagai pergeseran tata kehidupan masyarakat.</span></p><p><br></p><p><span style="color: rgb(84, 84, 84); background-color: rgb(255, 255, 255);">Teknologi baru khususnya teknologi pertanian di daerah pedesaan dl samping telah meningkatkan kesejahteraan, juga telah menimbulkan banyak waktu terluang bagi petani atau masyarakat khususnya buruh tani wanita, agar dapat mengurangi terjadinya pengangguran.</span></p><p><br></p><p><span style="color: rgb(84, 84, 84); background-color: rgb(255, 255, 255);">Di samping teknologi pertanian maka teknologi kimia berupa barang barang plastlk yang diproduksi secara masal dan mudah dibentuk menurut desain yang dikehendaki, dikemas secara menarik dan praktis telah memudahkan penyebarannya baik dalam negeri maupun ekspor dan sekaligus mengawetkan isi kemasannya.</span></p><p><br></p><p><span style="color: rgb(84, 84, 84); background-color: rgb(255, 255, 255);">Tentulah teknologi transportasi dan komunikasi memudahkan perpindahan manusia, barang dan informasi dari daerah perkotaan ke pedesaan dan sebaliknya.</span></p><p><br></p><p><span style="color: rgb(84, 84, 84); background-color: rgb(255, 255, 255);">Dari luas dan kedalaman pengaruh teknologi tersebut ke suatu daerah akan memberi dampak terciptanya proses transformasi dari masyarakat tradisional agraris ke industri modern yang dapat menopang pengembangan usaha kerajinan daerah. Semakin pentingnya kedudukan kerajinan disebabkan fungsinya sebagai media pelestarian dan peningkatan mutu nilai budaya. Dan adanya proses transformasi tersebut menyebabkan usaha kerajinan yang dahulu dikelola secara sambilan kini telah dikelola secara bisnis, sehingga menempatkan usaha kerajinan sebagai sumber penghidupan utama bagi masyarakat perajin di pedesaan.</span></p><p><br></p><p><span style="color: rgb(84, 84, 84); background-color: rgb(255, 255, 255);">Kerajinan sebagai produk ekonomi menduduki peran penting dalam rangka kebijaksanaan ekspor non migas karena dalam lima tahun terakhir ini ekspornya telah mencapai US$ 500 juta per-tahunnya. Oleh karena itu usaha kerajinan semakin mampu berkiprah dalam pembangunan termasuk dalam penyediaan lapangan usaha baru.</span></p><p><br></p><p><span style="color: rgb(84, 84, 84); background-color: rgb(255, 255, 255);">Menyadari akan kelangsungan hidup dari kerajinan yang menopang kehidupan berjutajuta keluarga yang dihadapkan pada kemajuan teknologi industri di satu sisi dan pelestarian nilai budaya bangsa yang harus tercermin dalam produk kerajinan, maka dipandang perlu adanya wadah partisipasi masyarakat bertaraf nasional yang berfungsi membantu dan sebagai mitra pemerintah dalam membina dan mengembangkan kerajinan. Itulah yang melatarbelakangi berdirinya Dewan Kerajinan Nasional.</span></p><p><br></p><p><span style="color: rgb(84, 84, 84); background-color: rgb(255, 255, 255);">Mengangkat martabat kerajinan sebagai karya cipta yang bernilai seni budaya dan ekonomi melibatkan berbagai sektor pembangunan seperti perindustrian, kebudayaan, koperasi, pariwisata, perdagangan, dunia usaha, dan perbankan.</span></p><p><br></p>',
                'visi' => '<p>Menjadi wadah utama bagi pencinta dan peminat seni dalam mengembangkan dan mempromosikan produk kerajinan tangan, serta memberdayakan komunitas pelaku bisnis kecil dan menengah (UKM) untuk mencapai kesejahteraan ekonomi dan sosial yang berkelanjutan.</p>',
                'misi' => '<p><strong>a. Memayungi dan Mengembangkan Kerajinan</strong>:</p><ol><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Menghimpun para pencinta dan peminat seni untuk berbagi pengetahuan, keterampilan, dan inovasi dalam pembuatan kerajinan tangan.</li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Menyediakan pelatihan, workshop, dan program edukasi untuk meningkatkan kualitas dan kreativitas produk kerajinan.</li></ol><p><strong>b. Mendukung Pengembangan Usaha</strong>:</p><ol><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Memberikan pendampingan dan konsultasi bisnis kepada para pelaku UKM untuk memperkuat manajemen dan strategi pemasaran.</li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Membantu akses ke sumber daya dan modal usaha melalui jaringan kemitraan dan program bantuan keuangan.</li></ol><p><strong>c. Meningkatkan Kehidupan Pelaku Bisnis</strong>:</p><ol><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Mendorong peningkatan pendapatan dan kesejahteraan pelaku usaha kecil dan menengah melalui pengembangan produk yang inovatif dan berdaya saing tinggi.</li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Mengadakan program pemberdayaan masyarakat untuk meningkatkan keterampilan kewirausahaan dan kemandirian ekonomi.</li></ol><p><strong>d. Memfasilitasi Jaringan dan Kolaborasi</strong>:</p><ol><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Membangun jaringan kolaborasi antara pelaku UKM, komunitas seni, pemerintah, dan sektor swasta untuk menciptakan peluang usaha yang lebih luas.</li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Mengadakan pameran, bazar, dan event promosi untuk memperkenalkan produk kerajinan kepada pasar yang lebih besar.</li></ol><p><strong>e. Mempromosikan Seni dan Budaya Lokal</strong>:</p><ol><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Melestarikan dan mempromosikan warisan seni dan budaya lokal melalui produk kerajinan yang otentik dan berkualitas tinggi.</li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Mendukung inisiatif budaya dan proyek seni yang meningkatkan apresiasi masyarakat terhadap kerajinan tangan.</li></ol><p><strong>f. Mengembangkan Platform Digital</strong>:</p><ol><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Membangun dan mengelola platform digital untuk memperluas jangkauan pasar dan memudahkan penjualan produk kerajinan secara online.</li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Menyediakan fasilitas e-commerce dan pelatihan digital bagi pelaku UKM untuk mengoptimalkan pemasaran produk secara daring.</li></ol>',
                'demografi' => '<p>Penduduk Kota Sukabumi cenderung bertambah setiap tahunnya. Pertambahan jumlah penduduk terbanyak yaitu di tahun 2020 dimana pertambahannya mencapai 17.645 jiwa. Lonjakan jumlah penduduk yang cukup besar tersebut dimungkinkan karena adanya pandemi Covid-19 sehingga penduduk yang merantau kembali ke Kota Sukabumi dengan berbagai pertimbangan.</p>',
                'geografi' => '<p>Kota Sukabumi merupakan sebuah kota terkecil ketiga (setelah Kota Cirebon dan Kota Cimahi) di Provinsi Jawa Barat. Kota Sukabumi dengan luas 48,33 km2 berada di kaki Gunung Gede dan Gunung Pangrango yang berada pada ketinggian 584 meter di atas permukaan laut. Adapun batas wilayahnya adalah sebagai berikut:</p><ol><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Sebelah utara berbatasan dengan Kecamatan Sukabumi, Kabupaten Sukabumi;</li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Sebelah selatan berbatasan dengan Kecamatan Nyalindung, Kabupaten Sukabumi;</li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Sebelah barat berbatasan dengan Kecamatan Cisaat, Kabupaten Sukabumi;</li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span>Sebelah timur berbatasan dengan Kecamatan Sukaraja, Kabupaten Sukabumi.</li></ol><p>Secara administratif, Kota Sukabumi terdiri dari 7 kecamatan dan 33 kelurahan. Adapun luas dataran masing-masing kecamatan yaitu Baros (5,58 km2), Lembursitu (10,69 km2), Cibeureum (9,12 km2), Citamiang (4,01 km2), Warudoyong (7,56 km2), Gunungpuyuh (5,15 km2), dan Cikole (6,22 km2).</p>',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
