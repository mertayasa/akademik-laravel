<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class NilaiKesehatanDataTable
{

    static public function set($nilai_kesehatan)
    {
        // 
        return Datatables::of($nilai_kesehatan)

            ->addColumn('action', function ($nilai_kesehatan) {
                $deleteUrl = "'" . route('nilai_kesehatan.destroy', $nilai_kesehatan->id) . "', 'NilaiKesehatanDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('nilai_kesehatan.edit', $nilai_kesehatan->id) . '" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b> Hapus</b></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
