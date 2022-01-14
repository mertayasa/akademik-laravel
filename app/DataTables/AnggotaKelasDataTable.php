<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class AnggotaKelasDataTable
{

    static public function set($anggota_kelas, $custom_action = null)
    {
        return Datatables::of($anggota_kelas)
            ->addColumn('action', function($anggota_kelas) use($custom_action) {
                return view(($custom_action != null ? $custom_action : 'anggota_kelas.datatable_action'), compact('anggota_kelas'));
            })
            ->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
