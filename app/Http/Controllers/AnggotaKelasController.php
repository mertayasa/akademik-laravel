<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKelas;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use App\Models\TahunAjar;
use Illuminate\Http\Request;
use App\DataTables\AnggotaKelasDataTable;
use Exception;
use Illuminate\Support\Facades\Log;

class AnggotaKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_kelas = null, AnggotaKelas $anggota_kelas)
    {
        $siswa = $id_kelas;
        return view('anggota_kelas.index', compact('siswa', 'anggota_kelas'));
    }

    public function datatable($kelas = null)
    {
        $siswa = Siswa::all();
        $siswa = AnggotaKelas::with('siswa')->where('id_kelas', $kelas)->get();

        // $anggota_kelas = AnggotaKelas::with('siswa')->whereHas('siswa', function ($siswa) use ($id_kelas) {
        //     $siswa->where('id_kelas', $id_kelas == null ? 1 : $id_kelas);
        // })->get();
        return AnggotaKelasDataTable::set($siswa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AnggotaKelas $anggota_kelas, $id_kelas)
    {
        $tahun_ajar = TahunAjar::pluck('keterangan', 'id');
        $kelas = $id_kelas;
        // dd($kelas);
        $siswa = Siswa::where('status', 'aktif')->pluck('nama', 'id');
        return view('anggota_kelas.create', compact('tahun_ajar', 'id_kelas', 'siswa', 'anggota_kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $anggota_kelas = new AnggotaKelas;
            $anggota_kelas->id_kelas = $request->id_kelas;
            $anggota_kelas->id_siswa = $request->id_siswa;
            $anggota_kelas->id_tahun_ajar = $request->id_tahun_ajar;
            $anggota_kelas->status = 'aktif';
            // $anggota_kelas->saran = $request->saran;

            // dd($anggota_kelas);
            $anggota_kelas->save();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data anggota_kelasn Gagal Ditambahkan');
        }

        return redirect()->route('anggota_kelas.index', $request->id_kelas)->with('success', 'Data anggota_kelasn Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnggotaKelas  $anggota_kelas
     * @return \Illuminate\Http\Response
     */
    public function show(AnggotaKelas $anggota_kelas, Siswa $siswa, User $user)
    {
        // $user = User::all();
        return view('anggota_kelas.show', compact('anggota_kelas', 'siswa', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnggotaKelas  $anggota_kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(AnggotaKelas $anggota_kelas, $id_kelas)
    {
        $tahun_ajar = TahunAjar::pluck('keterangan', 'id');
        // $kelas = Kelas::where('status', 'aktif')->pluck('kode', 'id');
        $kelas = $id_kelas;
        $siswa = Siswa::where('status', 'aktif')->pluck('nama', 'id');
        return view('anggota_kelas.edit', compact('kelas', 'id_kelas', 'tahun_ajar', 'anggota_kelas', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnggotaKelas  $anggota_kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $update = AnggotaKelas::find($id);
            $update->id_kelas = $request->id_kelas;
            $update->id_siswa = $request->id_siswa;
            $update->id_tahun_ajar = $request->id_tahun_ajar;
            $update->status = $request->status;
            // $update->saran = $request->saran;
            // dd($update);
            $update->save();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data anggota_kelas Gagal Di Edit');
        }

        return redirect('anggota_kelas')->with('info', 'Data anggota_kelas Berhasil Diedit  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggotaKelas  $anggota_kelas
     * @return \Illuminate\Http\Response
     */
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
