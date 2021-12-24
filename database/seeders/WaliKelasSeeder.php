<?php

namespace Database\Seeders;

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

        $wali_kelas = [
            [
                'id_user' => User::where('level', 'guru')->inRandomOrder()->first()->id,
                'id_kelas' => '1',
                'id_tahun_ajar' => TahunAjar::inRandomOrder()->first()->id,
            ],
            [
                'id_user' => User::where('level', 'guru')->inRandomOrder()->first()->id,
                'id_kelas' => '2',
                'id_tahun_ajar' => TahunAjar::inRandomOrder()->first()->id,
            ],
            [
                'id_user' => User::where('level', 'guru')->inRandomOrder()->first()->id,
                'id_kelas' => '3',
                'id_tahun_ajar' => TahunAjar::inRandomOrder()->first()->id,
            ],
            [
                'id_user' => User::where('level', 'guru')->inRandomOrder()->first()->id,
                'id_kelas' => '4',
                'id_tahun_ajar' => TahunAjar::inRandomOrder()->first()->id,
            ],
            [
                'id_user' => User::where('level', 'guru')->inRandomOrder()->first()->id,
                'id_kelas' => '5',
                'id_tahun_ajar' => TahunAjar::inRandomOrder()->first()->id,
            ],
            [
                'id_user' => User::where('level', 'guru')->inRandomOrder()->first()->id,
                'id_kelas' => '6',
                'id_tahun_ajar' => TahunAjar::inRandomOrder()->first()->id,
            ],
        ];

        foreach ($wali_kelas as $wali) {
            WaliKelas::updateOrCreate(['id_kelas' => $wali['id_kelas']], $wali);
        }
    }
}
