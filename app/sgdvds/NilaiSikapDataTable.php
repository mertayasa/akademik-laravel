<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class NilaiSikapDataTable
{

    static public function set($nilai_sikap)
    {
        // 
        return Datatables::of($nilai_sikap)

            ->addColumn('action', function ($nilai_sikap) {
                $deleteUrl = "'" . route('nilai_sikap.destroy', $nilai_sikap->id) . "', 'NilaiSikapDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('nilai_sikap.edit', $nilai_sikap->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><i class="menu-icon fa fa-trash"></i></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
