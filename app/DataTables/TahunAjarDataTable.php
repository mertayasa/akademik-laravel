<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class TahunAjarDataTable
{

    static public function set($tahun_ajar)
    {
        // 
        return Datatables::of($tahun_ajar)

            ->addColumn('action', function ($tahun_ajar) {
                return view('tahun_ajar.datatable_action', compact('tahun_ajar'));
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
