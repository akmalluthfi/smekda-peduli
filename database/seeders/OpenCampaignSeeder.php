<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campaign;
use App\Models\Comment;
use App\Models\Donation;
use Illuminate\Support\Str;

class OpenCampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campaigns = $this->getCampaigns();

        foreach ($campaigns as $campaign) {
            $title = $campaign['title'];
            $campaign = Campaign::factory()->create([
                'title' => $title,
                'slug' => Str::slug($title) . '-' . time(),
                'image' => $campaign['image'],
                'description' => $campaign['description']
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
                'title' => 'Bantu Bali Bangkit Kembali',
                'image' => 'campaings-image/06.jpg',
                'description' => "Cuaca ekstrem yang terjadi akhir-akhir ini menimbulkan beragam bencana alam di seluruh Indonesia, salah satunya seperti yang menimpa Bali. Hujan yang terus mengguyur Bali sejak hari Minggu (16/10/2022) menyebabkan banjir dan tanah longsor pada beberapa titik di wilayah Bali.Berdasarkan data dari BPBD Provinsi Bali yang dikutip melalui antaranews.com, musibah tersebut setidaknya telah menyebabkan 6 (enam) orang korban meninggal dunia. Diantaranya, tiga orang di Kabupaten Karangasem, satu orang di Bangli, satu orang di Tabanan, dan satu orang lainnya di Jembrana.Selain menyebabkan korban meninggal dunia, musibah banjir dan tanah longsor di Provinsi Bali juga menyebabkan sejumlah jembatan penghubung di kabupaten terputus dan sejumlah rumah warga dikabarkan mengalami rusak berat. Beberapa warga pun dilaporkan terpaksa mengungsi ke rumah saudara dan kerabat terdekat yang tidak terkena dampak banjir serta tanah longsor.TemanPeduli, jangan biarkan eksotisme Bali terbawa derasnya arus banjir. Mari bersama-bersama WeCare.id kita bantu pulihkan Bali dari bencana banjir dan tanah longsor. Bantuan terbaik kamu akan digunakan untuk membeli kebutuhan warga yang terdampak banjir dan tanah longsor hingga membantu pemulihan infrastruktur di Bali."
            ],
            [
                'title' => 'Segerakan Bantuanmu Ringankan Duka Saudara di Semeru',
                'image' => 'campaings-image/07.jpg',
                'description' => "Gunung Semeru dikabarkan kembali erupsi pada Sabtu (4/12) lalu tanpa adanya deteksi, diawali dengan getaran banjir lahar atau guguran awan panas yang dilanjut dengan abu vulkanik dan guguran lava pijar. Hal ini menyebabkan beberapa titik lokasi menjadi gelap tertutup kabut tebal sehingga membuat para warga berhamburan tanpa arah.Mengungsi di tempat yang lebih aman mau tak mau harus dilakukan. Walaupun berada di tempat pengungsian, para korban harus tetap memenuhi kebutuhan pangan dan kebutuhan hidup lainnya.Tim Aksi Cepat Tanggap segera merespons panggilan kemanusiaan dari bencana erupsi Gunung Semeru, Jawa Timur dengan terus bergerak membantu evakuasi dan pendataan korban, membangun posko bantuan, dan mendistribusikan berbagai bantuan kepada para korban terdampak bencana erupsi.Sahabat Dermawan, mari bantu ringankan derita warga yang terdampak erupsi bersama Aksi Cepat Tanggap disini.Yuk, Ulurkan Tanganmu Untuk Bantu Para Korban Bencana Akibat Erupsi Gunung Semeru!"
            ],
            [
                'title' => 'Bantu Korban Bencana Bersama Dompet Dhuafa',
                'image' => 'campaings-image/08.jpeg',
                'description' => '
                Hujan deras terus mengguyur wilayah Jakarta dan sekitarnya beberapa hari ini. Hujan dengan intensitas ini menimbulkan genangan dengan ketinggian hingga 1 meter.Ribuan warga yang tersebar di seluruh wilayah Jabodetabek pun terdampak banjir dan terpaksa mengungsi. Masih adanya potensi hujan juga membuat banjir Jabodetabek masih berpotensi berlanjut.Melihat kondisi ini, Dompet Dhuafa dan WeCare.id mengajak semua TemanPeduli untuk bergotong royong membantu para korban terdampak banjir dengan berdonasi melalui WeCare.id. Hasil donasi akan digunakan untuk nembeli bahan pokok, mengevakuasi korban banjir hingga memenuhi kebutuhan medis.Mari bersama bergandengan tangan untuk membantu mereka yang membutuhkan.                '
            ],
            [
                'title' => 'Mari Bantu Warga Jawa Barat Yang Terdampak Bencana',
                'image' => 'campaings-image/09.jpg',
                'description' => 'Resiko bencana terus mengintai negeri ini, dimana posisi Jawa Barat juga berada pada wilayah yang dilalui “ring of fire” sehingga bencana bisa datang kapan saja.Bencana-bencana kerap kali memakan banyak kerugian material ataupun memakan korban jiwa. Mereka yang terdampak, banyak sekali yang harus memulai kembali memperbaiki tatanan kehidupan dengan segala semua keterbatasan.Mari bergandengan tangan dan ambil peranmu untuk bisa membantu saudara-saudara yang terdampak bencana.'
            ],
            [
                'title' => 'Cukup dengan berdonasi sebesar Rp80.000/Al-quran kita sudah bisa turut serta hadirkan Al-Qur’an baru yang Layak bagi masyarakat di pelosok negeri dan juga para penyintas bencana alam.',
                'image' => 'campaings-image/10.jpeg',
                'description' => 'Setiap tahunnya Indonesia membutuhkan 5 juta eksemplar Al-Quran. Namun, kebutuhan ini masih belum bisa terpenuhi karena UPQ Kemenag baru berkemampuan mencetak 1 juta eksemplar pertahun. Tentunya hal ini bisa menjadi salah satu cara kita untuk turut serta dalam pemenuhan Al-Quran di Indonesia. Masih banyak saudara-suadara kita yang membutuhkan al-quran layak, seperti anak-anak di desa pelosok Indonesia yang masih menggunakan al-quran usang untuk mengaji, dan juga para penyintas bencana yang harus kehilangan al-qurannya karena rusak akibat terbawa arus banjir, atau terkena puing-puing bangunan.Berbagi al-quran juga bisa membantu kita dalam mengumpulkan amal jariyah, karena saat mereka membaca al-quran pemberian kita, pahala mengaji mereka juga ikut mengalir deras kepada kita. Cukup dengan berdonasi sebesar Rp80.000/Al-quran kita sudah bisa turut serta hadirkan Al-Qur’an baru yang Layak bagi masyarakat di pelosok negeri dan juga para penyintas bencana alam.Mari kirimkan donasi Anda sekarang juga agar kebutuhan al-quran layak dapat terpenuhi dan kita dapat lebih banyak lagi mencetak generasi quran di Indonesia. Lipatgandakan terus pahala Anda dengan berdonasi sebanyak-banyaknya!'
            ]
        ];
    }
}
