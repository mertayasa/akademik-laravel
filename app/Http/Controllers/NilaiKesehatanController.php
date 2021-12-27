<?php

namespace App\Http\Controllers;

use App\Models\NilaiKesehatan;
use App\Models\AnggotaKelas;
use Illuminate\Http\Request;
use App\DataTables\NilaiKesehatanDataTable;
use Exception;
use Illuminate\Support\Facades\Log;

class NilaiKesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai_kesehatan = NilaiKesehatan::all();
        // dd($nilai_kesehatan);
        return view('nilai_kesehatan.index', compact('nilai_kesehatan'));
    }

    public function datatable()
    {
        $nilai_kesehatan = NilaiKesehatan::all();
        return NilaiKesehatanDataTable::set($nilai_kesehatan);
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
        return view('nilai_kesehatan.create', compact('anggota_kelas'));
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
            NilaiKesehatan::create($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Nilai Kesehatan Gagal Ditambahkan');
        }

        return redirect('nilai_kesehatan')->with('success', 'Data Nilai Kesehatan Berhasil Ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiKesehatan  $nilai_kesehatan
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiKesehatan $nilai_kesehatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiKesehatan  $nilai_kesehatan
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiKesehatan $nilai_kesehatan)
    {
        $anggota_kelas = AnggotaKelas::with('siswa')->get()->pluck('siswa.nama', 'id');
        return view('nilai_kesehatan.edit', compact('anggota_kelas', 'nilai_kesehatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NilaiKesehatan  $nilai_kesehatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NilaiKesehatan $nilai_kesehatan)
    {
        try {
            $nilai_kesehatan->update($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Nilai Kesehatan Gagal Di Edit');
        }

        return redirect('nilai_kesehatan')->with('info', 'Data Nilai Kesehatan Berhasil Diedit  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiKesehatan  $nilai_kesehatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiKesehatan $nilai_kesehatan)
    {
        try {
            $nilai_kesehatan->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data Nilai Kesehatan']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data Nilai Kesehatan']);
    }
}
