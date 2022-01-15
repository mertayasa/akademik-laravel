<?php

namespace App\Http\Controllers;

use App\Models\WaliKelas;
use App\Models\Kelas;
use App\Models\User;
use App\Models\TahunAjar;
use Illuminate\Http\Request;
use App\DataTables\WaliKelasDataTable;
use App\Http\Requests\SetWaliKelasReq;
use Exception;
use Illuminate\Support\Facades\Log;

class WaliKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wali_kelas = WaliKelas::all();
        // $wali_kelas = WaliKelas::with('kelas')->get();
        // dd($wali_kelas);
        return view('wali_kelas.index', compact('wali_kelas'));
    }


    public function datatable()
    {
        $wali_kelas = WaliKelas::all();
        // $wali_kelas = WaliKelas::with('kelas')->get();
        return WaliKelasDataTable::set($wali_kelas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('level', 'guru')->where('status', 'aktif')->pluck('nama', 'id');
        $tahun_ajar = TahunAjar::where('status', 'aktif')->pluck('keterangan', 'id');
        $kelas = Kelas::where('status', 'aktif')->pluck('kode', 'id');
        return view('wali_kelas.create', compact('kelas', 'tahun_ajar', 'user'));
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
            WaliKelas::create($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Mata Pelajaran Gagal Ditambahkan');
        }

        return redirect('wali_kelas')->with('success', 'Data Mata Pelajaran Berhasil Ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WaliKelas  $waliKelas
     * @return \Illuminate\Http\Response
     */
    public function show(WaliKelas $wali_kelas)
    {
         $wali_kelas = WaliKelas::all();
        return view('wali_kelas.show', compact('wali_kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WaliKelas  $waliKelas
     * @return \Illuminate\Http\Response
     */
    public function edit(WaliKelas $wali_kelas)
    {
        $user = User::where('level', 'guru')->where('status', 'aktif')->pluck('nama', 'id');
        $tahun_ajar = TahunAjar::pluck('keterangan', 'id');
        $kelas = Kelas::where('status', 'aktif')->pluck('kode', 'id');
        return view('wali_kelas.edit', compact('kelas', 'tahun_ajar', 'user', 'wali_kelas'));
    }

    public function setWaliKelas(SetWaliKelasReq $request, Kelas $kelas, TahunAjar $tahun_ajar)
    {
        try{
            $wali_kelas = WaliKelas::updateOrCreate([
                'id_kelas' => $kelas->id,
                'id_tahun_ajar' => $tahun_ajar->id,
            ],[
                'id_kelas' => $kelas->id,
                'id_tahun_ajar' => $tahun_ajar->id,
                'id_user' => $request->id_guru
            ]);
            $wali_kelas->refresh();

            $data = [
                'wali_kelas' => $wali_kelas
            ];

            $wali_kelas_card = view('wali_kelas.form-show', $data)->render();
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal memperbarui data wali kelas']);
        }

        return response(['code' => 1, 'message' => 'Berhasil memperbarui data wali kelas', 'wali_kelas_card' => $wali_kelas_card, 'id_wali' => $wali_kelas->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WaliKelas  $waliKelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WaliKelas $wali_kelas)
    {
        try {
            $wali_kelas->update($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Mata Pelajaran Gagal Di Edit');
        }

        return redirect('wali_kelas')->with('info', 'Data Mata Pelajaran Berhasil Diedit  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WaliKelas  $waliKelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(WaliKelas $wali_kelas)
    {
        try {
            $wali_kelas->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data Mata Pelajaran']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data Mata Pelajaran']);
    }
}
