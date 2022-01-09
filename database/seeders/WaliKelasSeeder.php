<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\WaliKelas;
use App\Models\TahunAjar;
use App\Models\User;
use Illuminate\Database\Seeder;

class WaliKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // WaliKelas::factory()->count(6)->create();
        $tahun_ajar = TahunAjar::all();
        $kelas = Kelas::all();

        foreach($tahun_ajar as $tahun){
            foreach($kelas as $kel){
                $wali = [
                    'id_user' => User::where('level', 'guru')->inRandomOrder()->first()->id,
                    'id_kelas' => $kel->id,
                    'id_tahun_ajar' => $tahun->id,
                ];

                WaliKelas::updateOrCreate(['id_kelas' => $wali['id_kelas'], 'id_tahun_ajar' => $wali['id_tahun_ajar']], $wali);
            }
        }
    }
}
