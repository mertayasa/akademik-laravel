<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class KelasDataTable
{

    static public function set($kelas)
    {
        // 
        return Datatables::of($kelas)

            ->addColumn('action', function ($kelas) {
                $deleteUrl = "'" . route('kelas.destroy', $kelas->id) . "', 'KelasDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('kelas.edit', $kelas->id) . '" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b> Hapus</b></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
