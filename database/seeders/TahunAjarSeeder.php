<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TahunAjar;

class TahunAjarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tahun_ajar = [
            [
                'keterangan' => '2021/2022',
                'tahun_mulai' => '2021',
                'tahun_selesai' => '2022',
                'status' => TahunAjar::$nonaktif
            ],
            [
                'keterangan' => '2022/2023',
                'tahun_mulai' => '2022',
                'tahun_selesai' => '2023',
                'status' => TahunAjar::$aktif
            ],

        ];
        foreach ($tahun_ajar as $data) {
            TahunAjar::updateOrCreate(['keterangan' => $data['keterangan']], $data);
        }
    }
}
