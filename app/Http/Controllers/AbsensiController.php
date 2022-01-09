<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\AnggotaKelas;
use App\Models\TahunAjar;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            $tahun_ajar = TahunAjar::find($id_tahun_ajar);

            $semester = getSemester($tgl, $id_tahun_ajar);
            if(!$semester){
                return response(['code' => 0, 'message' => "Tanggal $tgl tidak termasuk pada tahun ajar yang dipilih", 'tahun_ajar' => $tahun_ajar]);
            }

            $data = [
                'semester' => $semester,
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
        try{
            $kehadiran = $request->kehadiran;
            if(!$kehadiran){
                return response(['code' => 0, 'message' => 'Data kehadiran wajib diisi']);
            }

            DB::transaction(function () use($kehadiran, $tgl, $semester){
                foreach($kehadiran as $key => $hadir){
                    Absensi::updateOrCreate([
                        'id_anggota_kelas' => $key,
                        'tgl_absensi' => $tgl,
                        'semester' => $semester
                    ], [
                        'id_anggota_kelas' => $key,
                        'kehadiran' => $hadir,
                        'semester' => $semester,
                        'tgl_absensi' => $tgl 
                    ]);
                }
            }, 5);

            $anggota_kelas = AnggotaKelas::where('id_kelas', $request->id_kelas)->where('id_tahun_ajar', $request->id_tahun_ajar);
            $durasi_absensi = Absensi::absensiAnggota($anggota_kelas->pluck('id')->toArray())->select('tgl_absensi')->distinct()->pluck('tgl_absensi');
            $durasi_absensi_ganjil = Absensi::absensiAnggotaGanjil($anggota_kelas->pluck('id')->toArray())->select('tgl_absensi')->distinct()->pluck('tgl_absensi');
            $durasi_absensi_genap = Absensi::absensiAnggotaGenap($anggota_kelas->pluck('id')->toArray())->select('tgl_absensi')->distinct()->pluck('tgl_absensi');
            
            $data = [
                'anggota_kelas' => $anggota_kelas->get(),
                'durasi_absensi' => $durasi_absensi,
                'durasi_absensi_ganjil' => $durasi_absensi_ganjil,
                'durasi_absensi_genap' => $durasi_absensi_genap,
                'id_kelas' => $request->id_kelas,
                'id_tahun_ajar' => $request->id_tahun_ajar,
            ];

            $table = view('absensi.table', $data)->render();
            $date_list = view('absensi.date_list', $data)->render();

        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menyimpan data absensi']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menyimpan data absensi', 'table' => $table, 'date_list' => $date_list]);
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
