<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Jadwal;
use App\Models\AnggotaKelas;
use Illuminate\Http\Request;
use App\DataTables\NilaiDataTable;
use Exception;
use Illuminate\Support\Facades\Log;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = nilai::all();
        // dd($nilai);
        return view('nilai.index', compact('nilai'));
    }

    public function datatable()
    {
        // Log::info($approval_status);
        $nilai = Nilai::all();
        return NilaiDataTable::set($nilai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwal = Jadwal::pluck('id');
        $anggota_kelas = AnggotaKelas::where('status', 'aktif')->pluck('id');
        return view('nilai.create', compact('jadwal', 'anggota_kelas'));
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
            Nilai::create($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data nilain Gagal Ditambahkan');
        }

        return redirect('nilai')->with('success', 'Data nilain Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        $jadwal = Jadwal::pluck('id');
        $anggota_kelas = AnggotaKelas::with('siswa')->get()->pluck('siswa.nama', 'id');
        return view('nilai.edit', compact('jadwal', 'nilai', 'anggota_kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        try {
            $nilai->update($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data nilai Gagal Di Edit');
        }

        return redirect('nilai')->with('info', 'Data nilai Berhasil Diedit  ');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        try {
            $nilai->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data nilai']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data nilai']);
    }
}
