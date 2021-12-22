<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\User;
use App\Models\TahunAjar;
use App\Models\Mapel;
use Illuminate\Http\Request;
use App\DataTables\JadwalDataTable;
use Exception;
use Illuminate\Support\Facades\Log;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = jadwal::all();
        // dd($jadwal);
        return view('jadwal.index', compact('jadwal'));
    }

    public function datatable()
    {
        // Log::info($approval_status);
        $jadwal = Jadwal::all();
        return JadwalDataTable::set($jadwal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Jadwal $jadwal)
    {
        $user = User::where('level', 'guru')->where('status', 'aktif')->pluck('nama', 'id');
        $tahun_ajar = TahunAjar::pluck('keterangan', 'id');
        $kelas = Kelas::where('status', 'aktif')->pluck('kode', 'id');
        $mapel = Mapel::where('status', 'aktif')->pluck('nama', 'id');
        return view('jadwal.create', compact('kelas', 'tahun_ajar', 'user', 'jadwal', 'mapel'));
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
            $jadwal = new Jadwal;
            $jadwal->id_user = $request->id_user;
            $jadwal->id_kelas = $request->id_kelas;
            $jadwal->id_mapel = $request->id_mapel;
            $jadwal->id_tahun_ajar = $request->id_tahun_ajar;
            $jadwal->jam_mulai = $request->jam_mulai;
            $jadwal->jam_selesai = $request->jam_selesai;
            $jadwal->hari = $request->hari;
            $jadwal->status = 'aktif';

            // dd($jadwal);
            $jadwal->save();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data jadwaln Gagal Ditambahkan');
        }

        return redirect('jadwal')->with('success', 'Data jadwaln Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        $user = User::where('level', 'guru')->where('status', 'aktif')->pluck('nama', 'id');
        $tahun_ajar = TahunAjar::pluck('keterangan', 'id');
        $kelas = Kelas::where('status', 'aktif')->pluck('kode', 'id');
        $mapel = Mapel::where('status', 'aktif')->pluck('nama', 'id');
        return view('jadwal.create', compact('kelas', 'tahun_ajar', 'user', 'jadwal', 'mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $update = Jadwal::find($id);
            $update->id_user = $request->id_user;
            $update->id_kelas = $request->id_kelas;
            $update->id_mapel = $request->id_mapel;
            $update->id_tahun_ajar = $request->id_tahun_ajar;
            $update->jam_mulai = $request->jam_mulai;
            $update->jam_selesai = $request->jam_selesai;
            $update->hari = $request->hari;
            $update->status = $request->status;
            // dd($update);
            $update->save();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data jadwal Gagal Di Edit');
        }

        return redirect('jadwal')->with('info', 'Data jadwal Berhasil Diedit  ');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        try {
            $jadwal->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data jadwal']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data jadwal']);
    }
}
