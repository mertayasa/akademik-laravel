<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKelas;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use App\Models\WaliKelas;
use App\Models\TahunAjar;
use Illuminate\Http\Request;
use App\DataTables\AnggotaKelasDataTable;
use App\Http\Requests\AddAnggotaKelasReq;
use App\Models\Jadwal;
use Exception;
use Illuminate\Support\Facades\Log;

class AnggotaKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_kelas, $id_tahun_ajar)
    {
        $jadwal = Jadwal::where('id_kelas', $id_kelas)->where('id_tahun_ajar', $id_tahun_ajar)->orderBy('kode_hari', 'ASC')->get();
        $data = [
            'siswa' => Siswa::pluck('nama', 'id'),
            'id_kelas' => $id_kelas,
            'id_tahun_ajar' => $id_tahun_ajar,
            'jadwal_kelas' => $jadwal,
            'wali_kelas' => WaliKelas::where('id_kelas', $id_kelas)->where('id_tahun_ajar', $id_tahun_ajar)->first()
        ];
        return view('anggota_kelas.index', $data);
    }

    public function datatable(Kelas $kelas, $id_tahun_ajar)
    {
        $siswa = $kelas->getAnggotaKelas($id_tahun_ajar);

        return AnggotaKelasDataTable::set($siswa);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddAnggotaKelasReq $request)
    {
        try {
            AnggotaKelas::create($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menambahkan data anggota kelas']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menambahkan data anggota kelas']);
    }

    public function destroy(AnggotaKelas $anggota_kelas)
    {
        try {
            $anggota_kelas->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data anggota_kelas']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data anggota_kelas']);
    }
}
