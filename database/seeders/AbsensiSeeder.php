<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Absensi;
use App\Models\AnggotaKelas;
use App\Models\TahunAjar;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tahun_ajar = TahunAjar::all();
        $status = ['hadir', 'sakit', 'ijin', 'alpa'];
        
        foreach($tahun_ajar as $tahun){
            $anggota_kelas = AnggotaKelas::where('id_tahun_ajar', $tahun->id)->get();
            $period_ganjil = CarbonPeriod::create($tahun->mulai_smt_ganjil, Carbon::parse($tahun->mulai_smt_ganjil)->addDays(5));
            $period_genap = CarbonPeriod::create($tahun->mulai_smt_genap, Carbon::parse($tahun->mulai_smt_genap)->addDays(5));
            $date_period_ganjil = $period_ganjil->toArray();
            $date_period_genap = $period_genap->toArray();
            
            foreach($date_period_ganjil as $date_pe){
                foreach($anggota_kelas as $anggota){
                    Absensi::create([
                        'id_anggota_kelas' => $anggota->id,
                        'tgl_absensi' => $date_pe,
                        'semester' => 'ganjil',
                        'kehadiran' => $status[rand(0,3)],
                    ]);
                }
            }
            
            foreach($date_period_genap as $date_pe){
                foreach($anggota_kelas as $anggota){
                    Absensi::create([
                        'id_anggota_kelas' => $anggota->id,
                        'tgl_absensi' => $date_pe,
                        'semester' => 'genap',
                        'kehadiran' => $status[rand(0,3)],
                    ]);
                }
            }
        }
    }
}
