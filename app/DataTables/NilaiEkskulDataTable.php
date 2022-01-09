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
                    '<a href="' . route('nilai_ekskul.edit', $nilai_ekskul->id) . '" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b> Hapus </b>></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
