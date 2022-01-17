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
use App\Http\Requests\AnggotaKelasReq;
use App\Models\Jadwal;
use App\Models\Mapel;
use Exception;
use Illuminate\Support\Facades\Log;

class AnggotaKelasController extends Controller
{
    public function datatable(Kelas $kelas, $id_tahun_ajar, $custom_action = null)
    {
        $siswa = $kelas->getAnggotaKelas($id_tahun_ajar);

        return AnggotaKelasDataTable::set($siswa, $custom_action);
    }

    public function store(AnggotaKelasReq $request)
    {
        try {
            AnggotaKelas::create($request->validated());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menambahkan data anggota kelas']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menambahkan data anggota kelas']);
    }

    public function getByKelasTahun(Kelas $kelas, TahunAjar $tahun_ajar)
    {
        try{
            $anggota_kelas = AnggotaKelas::byKelasAndTahun($kelas->id, $tahun_ajar->id)->get();
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal mengambil data anggota kelas']);
        }

        return response(['code' => 1, 'anggota_kelas' => $anggota_kelas]);
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
