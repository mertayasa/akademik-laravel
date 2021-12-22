<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\AnggotaKelas;
use Illuminate\Http\Request;
use App\DataTables\PrestasiDataTable;
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
        $prestasi = Prestasi::all();
        // dd($prestasi);
        return view('prestasi.index', compact('prestasi'));
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
        $anggota_kelas = AnggotaKelas::where('status', 'aktif')->pluck('id');

        $anggota_kelas = AnggotaKelas::with('siswa')->get()->pluck('siswa.nama', 'id');
        return view('prestasi.create', compact('anggota_kelas'));
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
            $prestasi = new Prestasi;
            $prestasi->id_anggota_kelas = $request->id_anggota_kelas;
            $prestasi->semester = $request->semester;
            $prestasi->nama = $request->nama;
            $prestasi->keterangan = $request->keterangan;
            // $prestasi->nilai = $request->nilai;

            // dd($prestasi);
            $prestasi->save();
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
        $anggota_kelas = AnggotaKelas::with('siswa')->get()->pluck('siswa.nama', 'id');
        return view('prestasi.edit', compact('anggota_kelas', 'prestasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $update = Prestasi::find($id);
            $update->id_anggota_kelas = $request->id_anggota_kelas;
            $update->semester = $request->semester;
            $update->nama = $request->nama;
            $update->keterangan = $request->keterangan;
            // $update->nilai = $request->nilai;

            $update->save();
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
