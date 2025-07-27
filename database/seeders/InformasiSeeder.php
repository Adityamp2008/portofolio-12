<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Informasi;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           informasi::create([
            'nama_lengkap' => 'Aditya Fikri Ramadhan',
            'nama_panggilan' => 'Adit',
            'kelas' => 'XI PPLG 1',
            'asal_sekolah' => 'SMK Negeri 1 Contoh',
            'deskripsi' => 'Saya seorang pelajar yang suka coding dan desain UI/UX.',
        ]);
    }
}
