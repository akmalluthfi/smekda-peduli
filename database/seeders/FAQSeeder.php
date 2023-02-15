<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FAQ::create([
            'question' => 'Apa itu Smekda Peduli?',
            'answer' => 'Smekda peduli adalah platform untuk menggalang dana dan berdonasi secara online yang di fokuskan untuk smkn 2 surabaya'
        ]);

        FAQ::create([
            'question' => 'Kepada siapa dana donasi disalurkan?',
            'answer' => 'Dana donasi akan disalurkan ke pihak admin sekolah dan dikelola oleh sekolah'
        ]);

        FAQ::create([
            'question' => 'Bagaimana cara menghubungi admin?',
            'answer' => 'Terdapat informasi alamat, nomor telepon, dan juga email di bagian bawah website'
        ]);

        FAQ::create([
            'question' => 'Bagaimana cara menghubungi admin?',
            'answer' => 'Terdapat informasi alamat, nomor telepon, dan juga email di bagian bawah website'
        ]);

        FAQ::create([
            'question' => 'Siapa pendiri Smekda Peduli',
            'answer' => 'Smekda peduli dibuat oleh salah satu siswa smk negeri 2 surabaya itu sendiri'
        ]);

        FAQ::create([
            'question' => 'Siapa yang bisa membuat campaign di Smekda Peduli?',
            'answer' => 'Pembuatan campaign hanya bisa dilakukan oleh admin sekolah, untuk dapat mengajukan campaign silahkan hubungi admin sekolah'
        ]);
    }
}
