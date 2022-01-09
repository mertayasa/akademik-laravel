<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class NilaiProporsiDataTable
{

    static public function set($nilai_proporsi)
    {
        // 
        return Datatables::of($nilai_proporsi)

            ->addColumn('action', function ($nilai_proporsi) {
                $deleteUrl = "'" . route('nilai_proporsi.destroy', $nilai_proporsi->id) . "', 'NilaiProporsiDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('nilai_proporsi.edit', $nilai_proporsi->id) . '" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b> Hapus</b></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
