<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class JadwalDataTable
{

    static public function set($jadwal)
    {
        // 
        return Datatables::of($jadwal)

            ->addColumn('action', function ($jadwal) {
                $deleteUrl = "'" . route('jadwal.destroy', $jadwal->id) . "', 'JadwalDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('jadwal.edit', $jadwal->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><i class="menu-icon fa fa-trash"></i></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
