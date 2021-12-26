<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Saran;

class SaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Saran::factory()->count(20)->create();
    }
}
