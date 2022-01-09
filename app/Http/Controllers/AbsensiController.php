<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\AnggotaKelas;
use App\Models\TahunAjar;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function generateForm($id_kelas, $id_tahun_ajar, $tgl)
    {
        try{
            $anggota_kelas = AnggotaKelas::where('id_kelas', $id_kelas)->where('id_tahun_ajar', $id_tahun_ajar)->get();
        
            $data = [
                'semester' => getSemester($tgl, $id_tahun_ajar),
                'tgl_absen' => $tgl,
                'anggota_kelas' => $anggota_kelas
            ];
    
            $form = view('absensi.form', $data)->render();
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal memuat form']);
        }
        return response(['code' => 1, 'form' => $form]);
    }

    public function updateOrCreate(Request $request, $semester, $tgl)
    {
        $kehadiran_raw = $request->kehadiran;
        $kehadiran = [];

        foreach($kehadiran_raw as $key => $hadir){
            Absensi::updateOrCreate([
                'id_anggota_kelas' => $key,
                'tgl_absensi' => $tgl 
            ], [
                'id_anggota_kelas' => $key,
                'kehadiran' => $hadir,
                'semester' => $semester,
                'tgl_absensi' => $tgl 
            ]);
            // array_push($kehadiran, [
            //     'id_anggota_kelas' => $key,
            //     'kehadiran' => $hadir,
            //     'id_tahun_ajar' => $id_tahun_ajar,
            //     'id_kelas' => $id_kelas,
            //     'tgl_absensi' => $tgl 
            // ]);
        }

        return response($kehadiran);
        
        return response($request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
