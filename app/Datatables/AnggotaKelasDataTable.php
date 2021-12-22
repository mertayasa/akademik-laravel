<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class AnggotaKelasDataTable
{

    static public function set($anggota_kelas)
    {
        // 
        return Datatables::of($anggota_kelas)

            ->addColumn('action', function ($anggota_kelas) {
                $deleteUrl = "'" . route('anggota_kelas.destroy', $anggota_kelas->id) . "', 'AnggotaKelasDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('anggota_kelas.edit', $anggota_kelas->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><i class="menu-icon fa fa-trash"></i></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
