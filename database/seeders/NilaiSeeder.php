<?php

namespace Database\Seeders;

use App\Models\AnggotaKelas;
use App\Models\Mapel;
use Illuminate\Database\Seeder;
use App\Models\Nilai;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Nilai::factory()->count(20)->create();

        $anggota_kelas = AnggotaKelas::all();
        $mapel = Mapel::inRandomOrder()->take(3)->get();
        foreach($mapel as $map){
            foreach ($anggota_kelas as $key => $anggota) {
                Nilai::create([
                    'id_anggota_kelas' => $anggota->id,
                    'id_mapel' => $map->id,
                    'semester' => 'ganjil',
                    'nilai' => rand(56, 99),
                ]);
            }
        }
        foreach($mapel as $map){
            foreach ($anggota_kelas as $key => $anggota) {
                Nilai::create([
                    'id_anggota_kelas' => $anggota->id,
                    'id_mapel' => $map->id,
                    'semester' => 'genap',
                    'nilai' => rand(56, 99),
                ]);
            }
        }
    }
}
