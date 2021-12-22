<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class WaliKelasDataTable
{

    static public function set($wali_kelas)
    {
        // 
        return Datatables::of($wali_kelas)

            ->addColumn('action', function ($wali_kelas) {
                $deleteUrl = "'" . route('wali_kelas.destroy', $wali_kelas->id) . "', 'WaliKelasDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('wali_kelas.edit', $wali_kelas->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><i class="menu-icon fa fa-trash"></i></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
