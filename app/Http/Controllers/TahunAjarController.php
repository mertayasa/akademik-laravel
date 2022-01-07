<?php

namespace App\Http\Controllers;

use App\Models\TahunAjar;
use Illuminate\Http\Request;
use App\DataTables\TahunAjarDataTable;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TahunAjarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun_ajar = TahunAjar::all();
        // dd($tahun_ajar);
        return view('tahun_ajar.index', compact('tahun_ajar'));
    }

    public function datatable()
    {
        $tahun_ajar = TahunAjar::all();
        return TahunAjarDataTable::set($tahun_ajar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tahun_ajar.create');
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
            TahunAjar::create($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Mata Pelajaran Gagal Ditambahkan');
        }

        return redirect('tahun_ajar')->with('success', 'Data Mata Pelajaran Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TahunAjar  $tahun_ajar
     * @return \Illuminate\Http\Response
     */
    public function show(TahunAjar $tahun_ajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TahunAjar  $tahun_ajar
     * @return \Illuminate\Http\Response
     */
    public function edit(TahunAjar $tahun_ajar)
    {
        return view('tahun_ajar.edit', compact('tahun_ajar'));
    }

    public function setActive(TahunAjar $tahun_ajar)
    {
        try{
            $rest_tahun_ajar = TahunAjar::whereNotIn('id', [$tahun_ajar->id])->get();
            DB::transaction(function() use($tahun_ajar, $rest_tahun_ajar){
                foreach($rest_tahun_ajar as $tahun){
                    $tahun->update([
                        'status' => TahunAjar::$nonaktif
                    ]);
                }
                $tahun_ajar->update([
                    'status' => TahunAjar::$aktif
                ]);
            }, 5);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal mengaktifkan tahun ajar']);
        }

        return response(['code' => 1, 'message' => 'Berhasil mengaktifkan tahun ajar']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TahunAjar  $tahun_ajar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TahunAjar $tahun_ajar)
    {
        try {
            $tahun_ajar->update($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Mata Pelajaran Gagal Di Edit');
        }

        return redirect('tahun_ajar')->with('info', 'Data Mata Pelajaran Berhasil Diedit  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TahunAjar  $tahun_ajar
     * @return \Illuminate\Http\Response
     */
    public function destroy(TahunAjar $tahun_ajar)
    {
        try {
            $tahun_ajar->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data Mata Pelajaran']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data Mata Pelajaran']);
    }
}
