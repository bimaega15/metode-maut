<?php

namespace Database\Seeders;

use App\Models\Konfigurasi;
use Illuminate\Database\Seeder;

class KonfigurasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Konfigurasi::create([
            'nama_konfigurasi' => 'Sistem Pakar CF & BC',
            'logo_konfigurasi' => 'default.png',
            'nohp_konfigurasi' => '082277562382',
            'alamat_konfigurasi' => 'Untuk menentukan diagnosa presentase kecanduan bermain gadet',
            'email_konfigurasi' => 'hadidta@gmail.com',
            'deskripsi_konfigurasi' => 'Sistem pakar menggunakan metode Certainty Factory & Backward Chaining',
            'created_konfigurasi' => 'Bima Ega @ Fullstack Developer',
        ]);
    }
}
