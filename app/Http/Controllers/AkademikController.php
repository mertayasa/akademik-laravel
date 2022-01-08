<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Akademik;
use App\Models\Kelas;
use App\Models\AnggotaKelas;
use App\Models\Mapel;
use App\Models\TahunAjar;
use App\Models\Siswa;
use App\Models\User;
use App\Models\WaliKelas;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class AkademikController extends Controller
{
    public function index(Request $request)
    {
        $kelas = Kelas::all();

        $id_tahun_ajar = $request->get('id_tahun_ajar');
        $tahun_ajar_active = TahunAjar::where('status', 'aktif')->first();
        $tahun_ajar = TahunAjar::pluck('keterangan', 'id');

        $data  =  [
            'id_tahun_ajar' => $id_tahun_ajar ?? $tahun_ajar_active->id,
            'tahun_ajar' => $tahun_ajar,
            'kelas' => $kelas
        ];

        return view('akademik.index', $data);
    }

    public function show($id_kelas, $id_tahun_ajar)
    {
        $anggota_kelas = AnggotaKelas::where('id_kelas', $id_kelas)->where('id_tahun_ajar', $id_tahun_ajar);
        $durasi_absensi = Absensi::select('tgl_absensi')->whereIn('id_anggota_kelas', $anggota_kelas->pluck('id')->toArray())->orderBy('tgl_absensi', 'ASC')->distinct()->pluck('tgl_absensi');
        $tahun_ajar = TahunAjar::find($id_tahun_ajar);

        $data = [
            'siswa' => Siswa::pluck('nama', 'id'),
            'id_kelas' => $id_kelas,
            'id_tahun_ajar' => $id_tahun_ajar,
            'tahun_ajar' => $tahun_ajar,
            'mapel' => Mapel::where('status', 'aktif')->pluck('nama', 'id'),
            'guru' => User::where('level', 'guru')->where('status', 'aktif')->pluck('nama', 'id'),
            'wali_kelas' => WaliKelas::where('id_kelas', $id_kelas)->where('id_tahun_ajar', $id_tahun_ajar)->first(),
            'count_anggota' => $anggota_kelas->count(),
            'anggota_kelas' => $anggota_kelas->get(),
            'durasi_absensi' => $durasi_absensi
        ];

        return view('akademik.show', $data);
    }

    public function seedAbsen()
    {
        $status = ['hadir', 'sakit', 'ijin', 'alpa'];
        $anggota_kelas = AnggotaKelas::all();
        $period = CarbonPeriod::create(Carbon::now()->subDays(10), Carbon::now());
        $date_period = $period->toArray();
        
        foreach($date_period as $date_pe){
            foreach($anggota_kelas as $anggota){
                Absensi::create([
                    'id_anggota_kelas' => $anggota->id,
                    'tgl_absensi' => $date_pe,
                    'kehadiran' => $status[rand(0,3)],
                ]);
            }
        }
        dd($date_period);
    }
}
