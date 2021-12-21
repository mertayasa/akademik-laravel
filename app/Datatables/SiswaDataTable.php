<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\DataTables;

class SiswaDataTable
{

    // 
    static public function set($siswa)
    {
        return Datatables::of($siswa)
            ->addColumn('action', function ($siswa) {
                $deleteUrl = "'" . route('siswa.destroy', $siswa->id) . "', 'SiswaDataTable'";

                return
                    '<div class="btn-group">' .
                    '<a href="' . route('siswa.edit', $siswa->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                    '<a href="' . route('siswa.show', $siswa->id) . '" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show" style="margin-right: 5px" ><i class="menu-icon fa fa-info"></i></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus" style="margin-right: 5px"><i class="menu-icon fa fa-trash"></i></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
