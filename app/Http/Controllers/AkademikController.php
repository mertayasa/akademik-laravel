<?php

namespace App\Http\Controllers;

use App\Models\Akademik;
use App\Models\Kelas;
use App\Models\AnggotaKelas;
use App\Models\TahunAjar;
use App\Models\Siswa;
use App\Models\WaliKelas;
use Illuminate\Http\Request;

class AkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = null)
    {
        $kelas = Kelas::all();
        // $kelas = Kelas::with('wali_kelas')->get();

        $tahun_ajar = TahunAjar::where('status', 'aktif')->pluck('keterangan', 'id');

        // dd($kelas);

        // $jumlahk = AnggotaKelas::groupBy('id_kelas');
        // dd($jumlahk);
        // $jumlah = $jumlah;

        // if ($status != null) {
        //     $kelas = Kelas::with('wali_kelas')->where('id_tahun_ajar', $status)->get();
        // } else {
        //     $kelas = Kelas::with('wali_kelas')->orderBy('id_kelas', 'asc')->get();
        // }

        // $kelas = Kelas::with('wali_kelas')->get()->pluck('wali_kelas.id_tahun_ajar', '2021/2022');
        // dd($kelas);


        return view('akademik.index', compact('kelas', 'tahun_ajar'));
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
     * @param  \App\Models\Akademik  $akademik
     * @return \Illuminate\Http\Response
     */
    public function show(Akademik $akademik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Akademik  $akademik
     * @return \Illuminate\Http\Response
     */
    public function edit(Akademik $akademik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Akademik  $akademik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Akademik $akademik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Akademik  $akademik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Akademik $akademik)
    {
        //
    }
}
