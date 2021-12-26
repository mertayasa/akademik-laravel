<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class PrestasiDataTable
{

    static public function set($prestasi)
    {
        // 
        return Datatables::of($prestasi)

            ->addColumn('action', function ($prestasi) {
                $deleteUrl = "'" . route('prestasi.destroy', $prestasi->id) . "', 'PrestasiDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('prestasi.edit', $prestasi->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><i class="menu-icon fa fa-trash"></i></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
