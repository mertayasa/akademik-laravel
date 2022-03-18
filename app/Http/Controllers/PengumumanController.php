<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\DataTables\PengumumanDataTable;
use App\Http\Requests\PengumumanRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pengumuman $pengumuman)
    {
        $pengumuman = Pengumuman::all();
        return view('pengumuman.index', compact('pengumuman'));
    }

    public function datatable()
    {
        $pengumuman = Pengumuman::all();
        return PengumumanDataTable::set($pengumuman);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengumumanRequest $request)
    {
        try {
            $data = $request->all();
            if($request['lampiran']){
                $base_64_lampiran = json_decode($request['lampiran'], true);
                $upload_image = uploadFile($base_64_lampiran, 'lampiran');
                if ($upload_image === 0) {
                    return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
                }
                $data['lampiran'] = $upload_image;
            }

            Pengumuman::create($data);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Pengumumann Gagal Ditambahkan');
        }

        return redirect('pengumuman')->with('success', 'Data Pengumumann Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(PengumumanRequest $request, Pengumuman $pengumuman)
    {
        try {
            $data = $request->all();
            if($request['lampiran']){
                $base_64_lampiran = json_decode($request['lampiran'], true);
                $upload_image = uploadFile($base_64_lampiran, 'lampiran');
                if ($upload_image === 0) {
                    return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
                }
                $data['lampiran'] = $upload_image;
            }

            $pengumuman->update($data);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Pengumuman Gagal Di Edit');
        }

        return redirect('pengumuman')->with('info', 'Data Pengumuman Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        try {
            $pengumuman->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data pengumuman']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data pengumuman']);
    }
}
