<?php

namespace App\Http\Controllers;

use App\Models\NilaiProporsi;
use App\Models\AnggotaKelas;
use Illuminate\Http\Request;
use App\DataTables\NilaiProporsiDataTable;
use Exception;
use Illuminate\Support\Facades\Log;

class NilaiProporsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai_proporsi = NilaiProporsi::all();
        // dd($nilai_proporsi);
        return view('nilai_proporsi.index', compact('nilai_proporsi'));
    }

    public function datatable()
    {
        $nilai_proporsi = NilaiProporsi::all();
        return NilaiProporsiDataTable::set($nilai_proporsi);
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
        return view('nilai_proporsi.create', compact('anggota_kelas'));
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
            NilaiProporsi::create($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Nilai Proporsi Gagal Ditambahkan');
        }

        return redirect('nilai_proporsi')->with('success', 'Data Nilai Proporsi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiProporsi  $nilai_proporsi
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiProporsi $nilai_proporsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiProporsi  $nilai_proporsi
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiProporsi $nilai_proporsi)
    {
        $anggota_kelas = AnggotaKelas::with('siswa')->get()->pluck('siswa.nama', 'id');
        return view('nilai_proporsi.edit', compact('anggota_kelas', 'nilai_proporsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NilaiProporsi  $nilai_proporsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NilaiProporsi $nilai_proporsi)
    {
        try {
            $nilai_proporsi->update($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Nilai Proporsi Gagal Di Edit');
        }

        return redirect('nilai_proporsi')->with('info', 'Data Nilai Proporsi Berhasil Diedit  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiProporsi  $nilai_proporsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiProporsi $nilai_proporsi)
    {
        try {
            $nilai_proporsi->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data Nilai Proporsi']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data Nilai Proporsi']);
    }
}
