<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class NilaiDataTable
{

    static public function set($nilai)
    {
        // 
        return Datatables::of($nilai)

            ->addColumn('action', function ($nilai) {
                $deleteUrl = "'" . route('nilai.destroy', $nilai->id) . "', 'NilaiDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('nilai.edit', $nilai->id) . '" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b> Hapus</b></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
