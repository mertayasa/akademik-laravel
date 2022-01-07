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
                $deleteUrl = "'" . route('jadwal.destroy', $jadwal->id) . "', 'jadwalDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="#" data-url="' . route('jadwal.update', $jadwal->id) . '" data-jadwal="'.  htmlspecialchars(json_encode($jadwal), ENT_QUOTES, 'UTF-8') .'" class="btn btn-warning" onclick="editJadwal(this)" data-bs-toggle="modal" data-bs-target="#jadwalModal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ')" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus" style="margin-right: 5px"><i class="menu-icon fa fa-trash"></i></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
