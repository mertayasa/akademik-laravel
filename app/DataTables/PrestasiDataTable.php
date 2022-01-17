<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class PrestasiDataTable
{

    static public function set($prestasi)
    {
        // 
        return Datatables::of($prestasi)
            ->addColumn('nama_kelas', function ($prestasi){
                return 'Kelas '.$prestasi->anggota_kelas->kelas->jenjang;
            })
            ->editColumn('semester', function ($prestasi){
                return ucfirst($prestasi->semester);
            })
            ->addColumn('tahun_ajar', function ($prestasi){
                return $prestasi->anggota_kelas->tahun_ajar->tahun_mulai.'-'.$prestasi->anggota_kelas->tahun_ajar->tahun_selesai;
            })
            ->addColumn('action', function ($prestasi) {
                $deleteUrl = "'" . route('prestasi.destroy', $prestasi->id) . "', 'PrestasiDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('prestasi.edit', $prestasi->id) . '" class="btn btn-sm  btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn  btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b> Hapus</b></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
