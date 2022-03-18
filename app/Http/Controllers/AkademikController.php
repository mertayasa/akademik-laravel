<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Akademik;
use App\Models\Kelas;
use App\Models\AnggotaKelas;
use App\Models\Ekskul;
use App\Models\Jadwal;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\TahunAjar;
use App\Models\Siswa;
use App\Models\User;
use App\Models\WaliKelas;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkademikController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $id_tahun_ajar = $request->get('id_tahun_ajar');
        $tahun_ajar_active = TahunAjar::where('status', 'aktif')->first();
        $tahun_ajar = TahunAjar::pluck('keterangan', 'id');
        
        if($user->isWali()){
            $id_kelas = $user->wali_kelas->where('id_tahun_ajar', $tahun_ajar_active->id)->pluck('id_kelas');
            $kelas = Kelas::whereIn('id', $id_kelas->toArray())->get();
        }else if($user->isAdmin()){
            $kelas = Kelas::all();
        }else{
            $kelas = collect([]);
        }

        $data  =  [
            'id_tahun_ajar' => $id_tahun_ajar ?? $tahun_ajar_active->id,
            'tahun_ajar' => $tahun_ajar,
            'kelas' => $kelas
        ];

        return view('akademik.index', $data);
    }

    public function show($id_kelas, $id_tahun_ajar)
    {
        $tahun_ajar = TahunAjar::find($id_tahun_ajar);
        $anggota_kelas = AnggotaKelas::byKelasAndTahun($id_kelas, $id_tahun_ajar);
        // $durasi_absensi = Absensi::absensiAnggota($anggota_kelas->pluck('id')->toArray())->select('tgl_absensi')->distinct()->pluck('tgl_absensi');
        // $durasi_absensi_ganjil = Absensi::absensiAnggotaGanjil($anggota_kelas->pluck('id')->toArray())->select('tgl_absensi')->distinct()->pluck('tgl_absensi');
        // $durasi_absensi_genap = Absensi::absensiAnggotaGenap($anggota_kelas->pluck('id')->toArray())->select('tgl_absensi')->distinct()->pluck('tgl_absensi');
        $mapel_of_jadwal = Jadwal::geetUniqueMapel($tahun_ajar->id, $id_kelas);
        $ekskul = Ekskul::all();

        $period_ganjil = Absensi::periodAbsensi($id_kelas, $id_tahun_ajar, 'ganjil');
        $period_genap = Absensi::periodAbsensi($id_kelas, $id_tahun_ajar, 'genap');

        $data = [
            'siswa' => Siswa::pluck('nama', 'id'),
            'guru' => User::guru()->get(),
            'ekskul' => $ekskul,
            'id_kelas' => $id_kelas,
            'id_tahun_ajar' => $id_tahun_ajar,
            'tahun_ajar' => $tahun_ajar,
            'mapel_of_jadwal' => $mapel_of_jadwal,
            'mapel' => Mapel::where('status', 'aktif')->pluck('nama', 'id'),
            'guru' => User::where('level', 'guru')->where('status', 'aktif')->pluck('nama', 'id'),
            'wali_kelas' => WaliKelas::where('id_kelas', $id_kelas)->where('id_tahun_ajar', $id_tahun_ajar)->first(),
            'count_anggota' => $anggota_kelas->count(),
            'anggota_kelas' => $anggota_kelas->get(),
            // 'durasi_absensi' => $durasi_absensi,
            // 'durasi_absensi_ganjil' => $durasi_absensi_ganjil,
            // 'durasi_absensi_genap' => $durasi_absensi_genap,
            'period_ganjil' => $period_ganjil,
            'period_genap' => $period_genap,
        ];

        // return view('absensi.table_ganjil', $data);
        return view('akademik.show', $data);
    }
}
