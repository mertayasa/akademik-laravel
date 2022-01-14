<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Akademik;
use App\Models\Kelas;
use App\Models\AnggotaKelas;
use App\Models\Ekskul;
use App\Models\Mapel;
use App\Models\Nilai;
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
        $tahun_ajar = TahunAjar::find($id_tahun_ajar);
        $anggota_kelas = AnggotaKelas::byKelasAndTahun($id_kelas, $id_tahun_ajar);
        $durasi_absensi = Absensi::absensiAnggota($anggota_kelas->pluck('id')->toArray())->select('tgl_absensi')->distinct()->pluck('tgl_absensi');
        $durasi_absensi_ganjil = Absensi::absensiAnggotaGanjil($anggota_kelas->pluck('id')->toArray())->select('tgl_absensi')->distinct()->pluck('tgl_absensi');
        $durasi_absensi_genap = Absensi::absensiAnggotaGenap($anggota_kelas->pluck('id')->toArray())->select('tgl_absensi')->distinct()->pluck('tgl_absensi');
        $mapel_of_nilai = Nilai::getUniqueMapel(Nilai::query(), $anggota_kelas->pluck('id')->toArray());
        $ekskul = Ekskul::all();

        // $asd = 'nama';
        // dd($ekskul[0]->$asd);

        $data = [
            'siswa' => Siswa::pluck('nama', 'id'),
            'ekskul' => $ekskul,
            'id_kelas' => $id_kelas,
            'id_tahun_ajar' => $id_tahun_ajar,
            'tahun_ajar' => $tahun_ajar,
            'mapel_of_nilai' => $mapel_of_nilai,
            'mapel' => Mapel::where('status', 'aktif')->pluck('nama', 'id'),
            'guru' => User::where('level', 'guru')->where('status', 'aktif')->pluck('nama', 'id'),
            'wali_kelas' => WaliKelas::where('id_kelas', $id_kelas)->where('id_tahun_ajar', $id_tahun_ajar)->first(),
            'count_anggota' => $anggota_kelas->count(),
            'anggota_kelas' => $anggota_kelas->get(),
            'durasi_absensi' => $durasi_absensi,
            'durasi_absensi_ganjil' => $durasi_absensi_ganjil,
            'durasi_absensi_genap' => $durasi_absensi_genap
        ];

        return view('akademik.show', $data);
    }
}
