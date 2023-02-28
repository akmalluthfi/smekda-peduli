<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campaign;
use App\Models\Comment;
use App\Models\Donation;
use Illuminate\Support\Str;

class CloseCampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $campaigns = $this->getCampaigns();
        // foreach ($campaigns as $campaign) {
        //     $title = $campaign['title'];
        //     $campaign = Campaign::factory()->create([
        //         'title' => $title,
        //         'slug' => Str::slug($title) . '-' . time(),
        //         'image' => $campaign['image'],
        //         'description' => $campaign['description'],
        //     ]);

        //     for ($j = 0; $j < rand(3, 10); $j++) {
        //         if (fake()->boolean()) {
        //             $comment = Comment::factory()->create(['campaign_id' => $campaign->id]);

        //             Donation::factory()->create([
        //                 'campaign_id' => $campaign->id,
        //                 'comment_id' => $comment->id
        //             ]);
        //         } else {
        //             Donation::factory()->create([
        //                 'campaign_id' => $campaign->id,
        //                 'comment_id' => null
        //             ]);
        //         }
        //     }
        // }

        for ($i = 0; $i < 10; $i++) {
            $campaign = Campaign::factory()->create([
                'status' => 'close',
                'duration' => date('Y-m-d H:i:s', strtotime("-" . rand(1, 7) . " days"))
            ]);

            for ($j = 0; $j < rand(3, 10); $j++) {
                if (fake()->boolean()) {
                    $comment = Comment::factory()->create(['campaign_id' => $campaign->id]);

                    Donation::factory()->create([
                        'campaign_id' => $campaign->id,
                        'comment_id' => $comment->id
                    ]);
                } else {
                    Donation::factory()->create([
                        'campaign_id' => $campaign->id,
                        'comment_id' => null
                    ]);
                }
            }
        }
    }

    public function getCampaigns()
    {
        return [
            [
                'title' => 'Bantu Korban Bencana Indonesia',
                'image' => 'campaings-image/01.jpg',
                'description' => "Letak geografis Indonesia berada di wilayah 'Ring Of Fire' sehingga menyebabkan negeri kita ini sering dilanda oleh bencana alam seperti Gempa Bumi, Gunung Meletus/Erupsi, Banjir, dan sebagainya.Dengan itu, BAZNAS Tanggap Bencana (BTB) akan selalu hadir dan sigap membantu warga yang terdampak bencana di Indonesia. Tim BTB sendiri terdiri dari personel yang memang ahli dalam bidangnya sehingga mereka dapat memberikan upaya terbaik dalam memberikan bantuan untuk warga terdampak bencana seperti membantu dalam proses evakuasi, pendirian tenda darurat, dapur air dan dapur umum, melakukan giat resik pasca bencana, dan lainnya.Seperti sebelum-sebelumnya, BAZNAS Tanggap Bencana turut hadir membantu warga terdampak bencana di Indonesia seperti Bencana Gempa di Cianjur dan Tapanuli, Banjir Bandang di Aceh dan Banten, serta masih banyak lagi.Mari terus dukung program ini dan bantu warga yang terdampak bencana di Indonesia dengan bersedekah ke Dompet Kebencanaan BAZNAS, karena kebaikan Anda sangat berarti untuk mereka semua."
            ],
            [
                'title' => 'Tanam Pohon untuk Indonesia Lestari',
                'image' => 'campaings-image/02.jpg',
                'description' => "Bantu Hijaukan Indonesia dengan Menanam Pohon
                Waktu kecil setiap hari minggu saya sering ikut bapak pergi masuk ke hutan untuk menebang pohon. Eh nggak nyangka sekarang saya dan bapak sering masuk ke hutan lagi tapi bedanya kini kami menjaganya, ucap Achmad Alamsyah atau yang biasa disapa Alam, pria kelahiran 2001 yang lahir dan besar di Desa Laman Satong.Awal mulanya, Alam bekerja sebagai staf di program reboisasi Alam Sehat Lestari (ASRI) karena belum menemukannya pekerjaan selepas lulus SMK. Namun setelah berjalan dua tahun bekerja di ASRI, Alam merasa sangat senang dengan apa yang ia lakukan, seperti mengidentifikasi pohon, menemukan banyak hewan dan burung di hutan, merasakan udara segar, dan tentunya melihat perkembangan pohon yang ia tanam dari kecil hingga menjadi besar.Bersama sang Ayah dan staf reboisasi lainnya, Alam merawat bibit-bibit pohon di persemaian, memonitoring area reboisasi, membantu pemasangan camera trap, dan melakukan penanaman pohon. Juliansyah atau Pak Jul, ayah Alam, bercerita tentang masa lalunya yang sempat menjadi seorang penebang liar. Ia sangat menyesal dengan perbuatannya yang dahulu merusak hutan. Saya ingin memperbaiki hutan yang dulu saya rusak. Saya ingin mengabdikan diri saya untuk menjaga hutan. Sekarang saya sadar, dengan menjaga hutan, manfaatnya tidak hanya untuk diri saya sendiri, tapi untuk anak cucuk saya nanti dan untuk dunia.Selain menyumbang oksigen, hutan pun telah menjadi sumber pangan untuk satwa dan masyarakat yang tinggal di sekitarnya. Saat musim buah, Alam dan masyarakat terkadang memanfaatkan buah-buahan yang ada di hutan untuk dimakan di rumah, seperti cempedak, rambutan, jengkol, durian, dan lain-lain. Saat ini, sejak tahun 2009, terdapat lebih dari 75 Ha lahan di Laman Satong yang telah Pak Jul, Alam, dan masyarakat sekitar lainnya tanami pohon dan merawatnya melalui program reboisasi kerjasama ASRI dan Balai Taman Nasional Gunung Palung. Jika di total, jumlah pohon yang berhasil mereka tanam adalah 239.483 dengan survival rate di atas 70%. Dari hasil monitoring melalui camera trap, ditemukannya berbagai macam satwa di hutan Laman Satong, seperti kera, rusa, monyet ekor merah, dan landak. Hal ini menunjukan bahwa ada makhluk hidup ciptaan Tuhan yang perlu kita jaga rumahnya. ASRI mendukung pemerintah khususnya Balai Taman Nasional Gunung Palung dalam merestorasi kembali hutan dengan melibatkan masyarakat sekitar di Desa Laman Satong, seperti Pak Jul dan Alam untuk turut aktif menjaganya.Selama kita hidup, satu manusia akan membutuhkan 15 pohon hanya untuk bernafas dan 730 pohon untuk menunjang kehidupan sehari-hari yang tidak akan bisa luput dari aktivitas yang mengemisikan karbon. Padahal, ternyata, jumlah pohon per manusia di bumi hanya ada 61, jadi wajar saja jika bumi ini semakin panas setiap harinya. Tapi, jangan menyerah dulu ya teman-teman, meskipun kita sering mendapat berita yang menyedihkan tentang our one and only earth, semua ini masih belum terlambat. Kita bisa ikut membantu Alam dan Pak Jul untuk menanam pohon dan merawatnya hingga besar. Yuk ikut serta Melestarikan Indonesia"
            ],
            [
                'title' => 'Bantu Wujudkan Akses Kesehatan yang Layak',
                'image' => 'campaings-image/03.png',
                'description' => 'Wakaf untuk kesehatan telah menjadi bagian dari sejarah penting wakaf semenjak zaman dahulu dan terus berkembang hingga saat ini. Hal itu disebabkan oleh kebutuhan umat Islam terhadap layanan kesehatan yang bersifat primer yang memiliki kecenderungan semakin meningkat. Semenjak zaman dahulu, Rumah Sakit yang di danai lembaga wakaf telah berkembang di Hijaz, Syam, Mesir, Sudan, dan negara-negara Islam lainnya, termasuk Indonesia.Peranan wakaf bagi layanan kesehatan umat diantaranya dengan mendirikan Rumah Sakit, Klinik umum ,penyediaan obat-obatan melalui apotek-apotek yang dirintis dan di danai oleh lembaga wakaf. Sejarah Islam juga mencatat kontribusi lembaga wakaf dalam bidang sumber daya manusia yang menangani layanan kesehatan, tenaga dokter, tabib, ahli bedah, dan perawat. Buku-buku dalam bidang kesehatan juga merupakan bagian yang tidak ditinggalkan oleh lembaga wakaf. Saat ini, keterbatasan akses dan finansial menjadi kendala utama bagi masyarakat dhuafa yang tidak bisa berobat. Kadang membuat mereka harus bertahan menahan sakit yang berkepanjangan. Melalui program reguler dibidang kesehatan, Rumah Yatim telah memberikan bantuan kesehatan kepada puluhan ribu dhuafa di berbagai provinsi berupa dana operasional pengobatan, bantuan alat penunjang kesehatan, pengobatan gratis, pengadaan sarana Ambulan serta pengadaan fasilitas klinik dibeberapa daerah.Semua yang telah dilakukan rasanya masih jauh dari kata cukup. Meningkatnya jumlah kaum dhuafa serta minimnya fasilitas kesehatan mendorong Rumah Yatim untuk terus berimprovisasi mengembangkan program untuk bisa melayani umat, salah satunya adalah melalui program wakaf sarana kesehatan.Program ini dimaksudkan untuk memfasilitasi kebutuhan sarana kesehatan seperti klinik dan Rumah Sakit agar sistem bantuan yang diberikan bisa tersentral dengan baik.Tahukah anda wakaf adalah salah satu amalan jariyah yang tidak akan pernah putus manfaat dan pahala.'
            ],
            [
                'title' => 'bangun sekolah di pelosok',
                'image' => 'campaings-image/04.jpeg',
                'description' => 'Berlantai, berdinding dan berjendela papan kayu seakan menjadi teman akrab dalam mengenyam pendidikan di pelosok Indonesia. Salah satunya di MI Nurul Huda Desa Pulau Palas, Kec. Tembilahan Hulu Kab. Indragiri Hilir, Riau.Bangunan panggung yang barada di tengah-tengah areal perkebunan kelapa ini berdiri sejak tahun 1989 atas swadaya masyarakat, dan hingga saat ini belum pernah mendapatkan bantuan baik sarana dan prasarana.Padahal jumlah siswa saat ini terbilang cukup banyak dibandingkan dari tahun-tahun sebelumnya, yaitu sekitar 54 siswa. Satu-satunya sekolah di Desa Pulau Palas, MI Nurul Huda tentunya menjadi harapan bagi masyarakat sebagai dasar sebuah pendidikan.Berlantai, berdinding dan berjendela papan kayu seakan menjadi teman akrab dalam mengenyam pendidikan di pelosok Indonesia. Salah satunya di MI Nurul Huda Desa Pulau Palas, Kec. Tembilahan Hulu Kab. Indragiri Hilir, Riau. Bangunan panggung yang barada di tengah-tengah areal perkebunan kelapa ini berdiri sejak tahun 1989 atas swadaya masyarakat, dan hingga saat ini belum pernah mendapatkan bantuan baik sarana dan prasarana. Padahal jumlah siswa saat ini terbilang cukup banyak dibandingkan dari tahun-tahun sebelumnya, yaitu sekitar 54 siswa. Satu-satunya sekolah di Desa Pulau Palas, MI Nurul Huda tentunya menjadi harapan bagi masyarakat sebagai dasar sebuah pendidikan.Gaduh sekali kak jika lagi belajar karena kan bersebelahan apalagi anak-anak kelas 1 dan 2 lagi aktif-aktifnya, ada yang jalan-jalan menengok ke kelas sebelah. Ya seperti ini kak kondisi kami sempit sangat tidak nyaman dan kondusif, namun pembelajaran harus tetap berjalan kan kak cerita Siti Munawarah (Guru Kelas 2 - 24 tahun)Bapak/Ibu apakah bisa membayangkan bagaimana sesaknya mereka dalam proses belajar mengajar dengan ruangan seperti ini?'
            ],
            [
                'title' => 'Bantu Wujudkan Indonesia Bebas Stunting',
                'image' => 'campaings-image/05.jpg',
                'description' => 'Seluruh wilayah di Indonesia, terdampak akibat pandemi Covid-19, termasuk daerah NTT. Berdasarkan data Satuan Tugas Covid-19 NTT Marius Jelamu pada Kamis, 22 Juli 2021 mengungkapkan terdapat tambahan 1.021 warga terinfeksi Covid-19 dalam sehari, yang merupakan rekor tertinggi selama pandemi. Total kasus Covid-19 di NTT menjadi 33.992 yakni dengan jumlah kasus aktif sebanyak 10.502 kasus (31%) dan korban meninggal sebanyak 666 orang, Berdasarkan Badan Pusat Statistik, Provinsi NTT menempati urutan pertama Rasio Penderita Gizi Buruk Tertinggi tahun 2018 (Per 10.000 Penduduk) yakni 9,7%. Menurut Studi Status Gizi Balita Kemenkes RI tahun 2019 NTT merupakan provinsi dg angka prevalensi stunting tertinggi di Indonesia yakni 43,8%. Gizi buruk merupakan salah satu bentuk malnutrisi, balita penderita gizi buruk ditandai dengan berat dan tinggi badan yg tidak sesuai dengan umurnya diakibatkan oleh kurangnya terpenuhinya kebutuhan protein. Didukung dengan data lain yakni menurut Kepala Dinas Kesehatan Kota Kupang,NTT Retnowati menyebutkan kasus gizi buruk pada tahun 2018 terdapat 218 kasus (1,47%), tahun 2019 ada 353 kasus (2,3%) dan tahun 2020 terdapat 796 kasus (5,0%). Salah satu faktor peningkatan gizi buruk adalah pandemi covid-19, dimana para orang tua takut ke fasilitas kesehatan untuk memeriksa kondisi gizi anaknya. Anak yang kurang gizi, dapat kembali ke kondisi gizi buruk jika asupan makananan di rumah tidak terpenuhi. Untuk itu, ketahanan pangan keluarga juga sangat penting dalam mendukung upaya pencegahannya. Rata-rata anak yang mengalami gizi buruk, sebagian besar merupakan warga miskin atau pendatang yang tidak memiliki penghasilan tetap ditambah dengan pandemi covid-19 yang menyebabkan berkurangnya sumber penghasilan atau diPHK'
            ]
        ];
    }
}
