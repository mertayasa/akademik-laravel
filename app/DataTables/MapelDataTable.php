<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class MapelDataTable
{

    static public function set($mapel)
    {
        // 
        return Datatables::of($mapel)
            ->editColumn('is_lokal', function ($mapel) {
                return isLokal($mapel->is_lokal);
            })

            ->addColumn('action', function ($mapel) {
                $deleteUrl = "'" . route('mapel.destroy', $mapel->id) . "', 'MapelDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('mapel.edit', $mapel->id) . '" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b> Hapus</b></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
