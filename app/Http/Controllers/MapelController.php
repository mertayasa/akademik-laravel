<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use App\DataTables\MapelDataTable;
use App\Http\Requests\MapelRequest;
use Exception;
use Illuminate\Support\Facades\Log;

use function GuzzleHttp\Promise\all;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = Mapel::all();
        // dd($mapel);
        return view('mapel.index', compact('mapel'));
    }

    public function datatable()
    {
        $mapel = Mapel::all();
        return MapelDataTable::set($mapel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MapelRequest $request)
    {
        try {
            Mapel::create($request->validated());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Mata Pelajaran Gagal Ditambahkan');
        }

        return redirect('mapel')->with('success', 'Data Mata Pelajaran Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        return view('mapel.edit', compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(MapelRequest $request, Mapel $mapel)
    {
        try {
            $mapel->update($request->validated());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Mata Pelajaran Gagal Di Edit');
        }

        return redirect('mapel')->with('info', 'Data Mata Pelajaran Berhasil Diedit  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        try {
            $mapel->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data Mata Pelajaran']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data Mata Pelajaran']);
    }
}
