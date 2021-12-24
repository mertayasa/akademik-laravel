<?php

namespace App\Http\Controllers;

use App\Models\Akademik;
use App\Models\Kelas;
use App\Models\AnggotaKelas;
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
    public function index()
    {
        // $kelas = Kelas::all();
        // $kelas = Kelas::with('wali_kelas')->get();

        $kelas = WaliKelas::with('kelas')->get();
        // $kelas = AnggotaKelas::with('kelas')->selectRaw('DISTINCT id_kelas')->get();


        return view('akademik.index', compact('kelas'));
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
