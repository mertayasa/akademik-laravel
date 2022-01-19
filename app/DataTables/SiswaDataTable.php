<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\DataTables;

class SiswaDataTable
{

    // 
    static public function set($siswa,$custom_action = null)
    {
        return Datatables::of($siswa)
            ->editColumn('foto', function ($siswa){
                return '<img src="'.$siswa->getFoto().'" alt="" width="75px">';
            })
            ->addColumn('action', function($siswa) use($custom_action) {
                return view(($custom_action != null ? $custom_action : 'siswa.datatable_action'), compact('siswa'));
            })
            ->addIndexColumn()->rawColumns(['action', 'foto'])->make(true);
    }
}
