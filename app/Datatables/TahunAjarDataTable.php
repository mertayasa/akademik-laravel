<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class TahunAjarDataTable
{

    static public function set($tahun_ajar)
    {
        // 
        return Datatables::of($tahun_ajar)

            ->addColumn('action', function ($tahun_ajar) {
                $deleteUrl = "'" . route('tahun_ajar.destroy', $tahun_ajar->id) . "', 'TahunAjarDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('tahun_ajar.edit', $tahun_ajar->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><i class="menu-icon fa fa-trash"></i></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
