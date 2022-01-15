<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class JadwalDataTable
{

    static public function set($jadwal)
    {
        // 
        return Datatables::of($jadwal)

            ->addColumn('action', function($jadwal) {
                return view('jadwal.datatable_action', compact('jadwal'));
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
