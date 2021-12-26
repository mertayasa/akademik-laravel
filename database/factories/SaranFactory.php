<?php

namespace Database\Factories;

use App\Models\AnggotaKelas;

use Illuminate\Database\Eloquent\Factories\Factory;

class SaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $semester = ['ganjil', 'genap'];
        return [
            'id_anggota_kelas' => AnggotaKelas::inRandomOrder()->first()->id,
            'semester' => $semester[rand(0, 1)],
            'keterangan' => $this->faker->text(50),

        ];
    }
}
