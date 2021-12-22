<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class NilaiEkskulDataTable
{

    static public function set($nilai_ekskul)
    {
        // 
        return Datatables::of($nilai_ekskul)

            ->addColumn('action', function ($nilai_ekskul) {
                $deleteUrl = "'" . route('nilai_ekskul.destroy', $nilai_ekskul->id) . "', 'NilaiEkskulDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('nilai_ekskul.edit', $nilai_ekskul->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><i class="menu-icon fa fa-trash"></i></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
