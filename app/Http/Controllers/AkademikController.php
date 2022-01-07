<?php

namespace App\Http\Controllers;

use App\Models\Akademik;
use App\Models\Kelas;
use App\Models\AnggotaKelas;
use App\Models\Mapel;
use App\Models\TahunAjar;
use App\Models\Siswa;
use App\Models\User;
use App\Models\WaliKelas;
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
        $data = [
            'siswa' => Siswa::pluck('nama', 'id'),
            'id_kelas' => $id_kelas,
            'id_tahun_ajar' => $id_tahun_ajar,
            'mapel' => Mapel::where('status', 'aktif')->pluck('nama', 'id'),
            'guru' => User::where('level', 'guru')->where('status', 'aktif')->pluck('nama', 'id'),
            'wali_kelas' => WaliKelas::where('id_kelas', $id_kelas)->where('id_tahun_ajar', $id_tahun_ajar)->first()
        ];
        return view('akademik.show', $data);
    }
}
