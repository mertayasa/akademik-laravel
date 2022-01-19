<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class AnggotaKelasDataTable
{

    static public function set($anggota_kelas, $custom_action = null)
    {
        return Datatables::of($anggota_kelas)
            ->addColumn('nama_kelas', function($anggota_kelas){
                return 'Kelas '.$anggota_kelas->kelas->jenjang;
            })
            ->editColumn('foto', function ($anggota_kelas){
                return '<img src="'.$anggota_kelas->siswa->getFoto().'" alt="" width="75px">';
            })
            ->addColumn('action', function($anggota_kelas) use($custom_action) {
                return view(($custom_action != null ? $custom_action : 'anggota_kelas.datatable_action'), compact('anggota_kelas'));
            })
            ->addIndexColumn()->rawColumns(['action', 'foto'])->make(true);
    }
}
