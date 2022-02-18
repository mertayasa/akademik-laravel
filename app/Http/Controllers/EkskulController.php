<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;
use App\DataTables\EkskulDataTable;
use App\Http\Requests\EkskulRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ekskul = Ekskul::all();
        // dd($ekskul);
        return view('ekskul.index', compact('ekskul'));
    }

    public function datatable()
    {
        // Log::info($approval_status);
        $ekskul = Ekskul::all();
        return EkskulDataTable::set($ekskul);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ekskul.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EkskulRequest $request)
    {
        try {
            Ekskul::create($request->validated());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data ekskuln Gagal Ditambahkan');
        }

        return redirect('ekskul')->with('success', 'Data ekskuln Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function show(Ekskul $ekskul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function edit(Ekskul $ekskul)
    {
        return view('ekskul.edit', compact('ekskul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function update(EkskulRequest $request, Ekskul $ekskul)
    {
        try {
            $ekskul->update($request->validated());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data ekskul Gagal Di Edit');
        }

        return redirect('ekskul')->with('info', 'Data ekskul Berhasil Diedit  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ekskul $ekskul)
    {
        try {
            $ekskul->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data ekskul']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data ekskul']);
    }
}
