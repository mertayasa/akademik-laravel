<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class AnggotaKelasDataTable
{

    static public function set($anggota_kelas)
    {
        // 
        return Datatables::of($anggota_kelas)

            ->addColumn('action', function ($anggota_kelas) {
                $deleteUrl = "'" . route('anggota_kelas.destroy', $anggota_kelas->id) . "', 'AnggotaKelasDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . 'asd' . '" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat Profil" style="margin-right: 5px" > <i class="fas fa-address-card"></i> </a>' .
                    '<a href="' . route('siswa.show', $anggota_kelas->siswa->id) . '" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Atur Nilai" style="margin-right: 5px" ><i class="fas fa-star"></i></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Dari Kelas" style="margin-right: 5px"><i class="menu-icon fa fa-trash"></i></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
