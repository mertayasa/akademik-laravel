<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;
use App\Models\WaliKelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = [
            [
                'kode' => 'Kelas I',
                'jenjang' => '1',
                // WaliKelas::inRandomOrder()->first()->id,

            ],
            [
                'kode' => 'Kelas II',
                'jenjang' => '2',
                // WaliKelas::inRandomOrder()->first()->id,

            ],
            [
                'kode' => 'Kelas III',
                'jenjang' => '3',
                // WaliKelas::inRandomOrder()->first()->id,

            ],
            [
                'kode' => 'Kelas IV',
                'jenjang' => '4',
                // WaliKelas::inRandomOrder()->first()->id,

            ],
            [
                'kode' => 'Kelas V',
                'jenjang' => '5',
                // WaliKelas::inRandomOrder()->first()->id,

            ],
            [
                'kode' => 'Kelas VI',
                'jenjang' => '6',
                // WaliKelas::inRandomOrder()->first()->id,


            ],
        ];
        foreach ($kelas as $data) {
            Kelas::updateOrCreate(['kode' => $data['kode']], $data);
        }
    }
}
