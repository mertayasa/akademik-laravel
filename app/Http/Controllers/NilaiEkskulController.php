<?php

namespace App\Http\Controllers;

use App\Models\NilaiEkskul;
use App\Models\Ekskul;
use App\Models\Siswa;
use App\Models\AnggotaKelas;
use Illuminate\Http\Request;
use App\DataTables\NilaiEkskulDataTable;
use Exception;
use Illuminate\Support\Facades\Log;

class NilaiEkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai_ekskul = NilaiEkskul::all();
        // dd($nilai_ekskul);
        return view('nilai_ekskul.index', compact('nilai_ekskul'));
    }

    public function datatable()
    {
        $nilai_ekskul = NilaiEkskul::all();
        return NilaiEkskulDataTable::set($nilai_ekskul);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ekskul = Ekskul::where('status', 'aktif')->pluck('nama', 'id');
        $anggota_kelas = AnggotaKelas::with('siswa')->get()->pluck('siswa.nama', 'id');
        return view('nilai_ekskul.create', compact('ekskul', 'anggota_kelas'));
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
            NilaiEkskul::create($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Nilai Ekskul Gagal Ditambahkan');
        }

        return redirect('nilai_ekskul')->with('success', 'Data Nilai Ekskul Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiEkskul  $nilai_ekskul
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiEkskul $nilai_ekskul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiEkskul  $nilai_ekskul
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiEkskul $nilai_ekskul)
    {
        $ekskul = Ekskul::where('status', 'aktif')->pluck('nama', 'id');
        $anggota_kelas = AnggotaKelas::with('siswa')->get()->pluck('siswa.nama', 'id');
        return view('nilai_ekskul.edit', compact('ekskul', 'anggota_kelas', 'nilai_ekskul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NilaiEkskul  $nilai_ekskul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NilaiEkskul $nilai_ekskul)
    {
        try {
            $nilai_ekskul->update($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Nilai Ekskul Gagal Di Edit');
        }

        return redirect('nilai_ekskul')->with('info', 'Data Nilai Ekskul Berhasil Diedit  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiEkskul  $nilai_ekskul
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiEkskul $nilai_ekskul)
    {
        try {
            $nilai_ekskul->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data Nilai Ekskul']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data Nilai Ekskul']);
    }
}
