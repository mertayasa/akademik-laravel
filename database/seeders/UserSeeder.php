<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create('id_ID');
        $pekerjaan = ['guru mapel', 'wali'];
        $pekerjaan_ortu = ['pegawai', 'petani', 'wirausaha', 'wiraswasta'];
        $status_guru = ['tetap', 'honorer'];
        $kelamin = ['Laki-laki', 'Perempuan'];
        $users = [
            [
                'nama' => 'Admin',
                'email' => 'admin@demo.com',
                'nip' => $faker->numberBetween(100000000, 200000000),
                'alamat' => $faker->address(),
                'tempat_lahir' => $faker->address(),
                'tgl_lahir' => $faker->dateTimeBetween(Carbon::now()->subYears(45), Carbon::now()->subYears(17)),
                'no_tlp' => $faker->e164PhoneNumber(),
                'pekerjaan' => 'admin',
                'jenis_kelamin' => $kelamin[rand(0, 1)],
                'status_guru' => 'bukan_guru',
                'level' => 'admin',
                'email_verified_at' => now(),
                'password' => bcrypt('asdasdasd'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'nama' => 'Guru 1',
                'nip' => $faker->numberBetween(100000000, 200000000),
                'alamat' => $faker->address(),
                'tempat_lahir' => $faker->address(),
                'tgl_lahir' => $faker->dateTimeBetween(Carbon::now()->subYears(45), Carbon::now()->subYears(17)),
                'no_tlp' => $faker->e164PhoneNumber(),
                'pekerjaan' => $pekerjaan[rand(0, 1)],
                'jenis_kelamin' => $kelamin[rand(0, 1)],
                'status_guru' => $status_guru[rand(0, 1)],
                'email' => 'guru1@demo.com',
                'level' => 'guru',
                'email_verified_at' => now(),
                'password' => bcrypt('asdasdasd'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'nama' => 'Guru 2',
                'nip' => $faker->numberBetween(100000000, 200000000),
                'alamat' => $faker->address(),
                'tempat_lahir' => $faker->address(),
                'tgl_lahir' => $faker->dateTimeBetween(Carbon::now()->subYears(45), Carbon::now()->subYears(17)),
                'no_tlp' => $faker->e164PhoneNumber(),
                'pekerjaan' => $pekerjaan[rand(0, 1)],
                'jenis_kelamin' => $kelamin[rand(0, 1)],
                'status_guru' => $status_guru[rand(0, 1)],
                'email' => 'guru2@demo.com',
                'level' => 'guru',
                'email_verified_at' => now(),
                'password' => bcrypt('asdasdasd'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'nama' => 'Orang Tua',
                // 'nip' => $faker->numberBetween(100000000, 200000000),
                'alamat' => $faker->address(),
                'tempat_lahir' => $faker->address(),
                'tgl_lahir' => $faker->dateTimeBetween(Carbon::now()->subYears(45), Carbon::now()->subYears(17)),
                'no_tlp' => $faker->e164PhoneNumber(),
                'pekerjaan' => $pekerjaan_ortu[rand(0, 3)],
                'jenis_kelamin' => $kelamin[rand(0, 1)],
                'status_guru' => 'bukan_guru',
                'email' => 'ortu@demo.com',
                'level' => 'ortu',
                'email_verified_at' => now(),
                'password' => bcrypt('asdasdasd'), // password
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['email' => $user['email']], $user);
        }
    }
}
