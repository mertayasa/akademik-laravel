<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class EkskulDataTable
{

    static public function set($ekskul)
    {
        // 
        return Datatables::of($ekskul)
            ->editColumn('is_lokal', function ($ekskul) {
                return isLokal($ekskul->is_lokal);
            })

            ->addColumn('action', function ($ekskul) {
                $deleteUrl = "'" . route('ekskul.destroy', $ekskul->id) . "', 'EkskulDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('ekskul.edit', $ekskul->id) . '" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b> Hapus</b></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
