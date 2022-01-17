<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\AnggotaKelas;
use Illuminate\Http\Request;
use App\DataTables\PrestasiDataTable;
use App\Models\Kelas;
use App\Models\TahunAjar;
use Exception;
use Illuminate\Support\Facades\Log;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prestasi.index');
    }

    public function datatable()
    {
        $prestasi = Prestasi::all();
        return PrestasiDataTable::set($prestasi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::orderBy('jenjang', 'ASC')->get()->pluck('nama_kelas', 'id')->toArray();
        $tahun_ajar = TahunAjar::orderBy('tahun_mulai')->get()->pluck('durasi_tahun_ajar', 'id')->toArray();

        $data = [
            'kelas' => $kelas,
            'tahun_ajar' => $tahun_ajar,
        ];

        return view('prestasi.create', $data);
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
            Prestasi::create($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Prestasi Gagal Ditambahkan');
        }

        return redirect('prestasi')->with('success', 'Data Prestasi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function show(Prestasi $prestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestasi $prestasi)
    {
        $kelas = Kelas::orderBy('jenjang', 'ASC')->get()->pluck('nama_kelas', 'id')->toArray();
        $tahun_ajar = TahunAjar::orderBy('tahun_mulai')->get()->pluck('durasi_tahun_ajar', 'id')->toArray();

        $data = [
            'selected_tahun_ajar' => $prestasi->anggota_kelas->id_tahun_ajar,
            'selected_kelas' => $prestasi->anggota_kelas->id_kelas,
            'prestasi' => $prestasi,
            'kelas' => $kelas,
            'tahun_ajar' => $tahun_ajar,
        ];

        // dd($prestasi);

        return view('prestasi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        try {
            $prestasi->update($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Prestasi Gagal Di Edit');
        }

        return redirect('prestasi')->with('info', 'Data Prestasi Berhasil Diedit  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestasi $prestasi)
    {
        try {
            $prestasi->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data Prestasi']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data Prestasi']);
    }
}
