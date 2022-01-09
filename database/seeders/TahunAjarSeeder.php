<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TahunAjar;
use Carbon\Carbon;

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
                'mulai_smt_ganjil' => '2021-01-15',
                'selesai_smt_ganjil' => '2021-06-01',
                'mulai_smt_genap' => '2021-07-01',
                'selesai_smt_genap' => '2022-01-15',
                'status' => TahunAjar::$nonaktif
            ],
            [
                'keterangan' => '2022/2023',
                'tahun_mulai' => '2022',
                'tahun_selesai' => '2023',
                'mulai_smt_ganjil' => '2022-01-15',
                'selesai_smt_ganjil' => '2022-06-01',
                'mulai_smt_genap' => '2022-07-01',
                'selesai_smt_genap' => '2023-01-15',
                'status' => TahunAjar::$aktif
            ],

        ];
        foreach ($tahun_ajar as $data) {
            TahunAjar::updateOrCreate(['keterangan' => $data['keterangan']], $data);
        }
    }
}
