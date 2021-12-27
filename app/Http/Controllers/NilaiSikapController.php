<?php

namespace App\Http\Controllers;

use App\Models\NilaiSikap;
use App\Models\Siswa;
use App\Models\AnggotaKelas;
use Illuminate\Http\Request;
use App\DataTables\NilaiSikapDataTable;
use Exception;
use Illuminate\Support\Facades\Log;

class NilaiSikapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai_sikap = NilaiSikap::all();
        // dd($nilai_sikap);
        return view('nilai_sikap.index', compact('nilai_sikap'));
    }

    public function datatable()
    {
        $nilai_sikap = NilaiSikap::all();
        return NilaiSikapDataTable::set($nilai_sikap);
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
        return view('nilai_sikap.create', compact('anggota_kelas'));
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
            NilaiSikap::create($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Nilai Sikap Gagal Ditambahkan');
        }

        return redirect('nilai_sikap')->with('success', 'Data Nilai Sikap Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiSikap  $nilai_sikap
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiSikap $nilai_sikap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiSikap  $nilai_sikap
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiSikap $nilai_sikap)
    {
        $anggota_kelas = AnggotaKelas::with('siswa')->get()->pluck('siswa.nama', 'id');
        return view('nilai_sikap.edit', compact('anggota_kelas', 'nilai_sikap'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NilaiSikap  $nilai_sikap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NilaiSikap $nilai_sikap)
    {
        try {
            $nilai_sikap->update($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Nilai Sikap Gagal Di Edit');
        }

        return redirect('nilai_sikap')->with('info', 'Data Nilai Sikap Berhasil Diedit  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiSikap  $nilai_sikap
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiSikap $nilai_sikap)
    {
        try {
            $nilai_sikap->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data Nilai Sikap']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data Nilai Sikap']);
    }
}
