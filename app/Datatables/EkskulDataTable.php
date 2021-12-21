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
                $deleteUrl = "'" . route('ekskul.destroy', $ekskul->id) . "', 'ekskulDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('ekskul.edit', $ekskul->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><i class="menu-icon fa fa-trash"></i></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
