<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class UserDataTable
{
    static public function set($user, $level)
    {
        return Datatables::of($user, $level)
            ->editColumn('foto', function ($user){
                return '<img src="'.$user->getFoto().'" alt="" width="75px">';
            })
            ->addColumn('action', function ($user) use ($level) {
                return
                    '<div class="btn-group">' .
                    '<a href="' . route($level . '.edit', $user->id) . '" class="btn  btn-sm  btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    '<a href="' . route($level . '.show', $user->id) . '" class="btn  btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat" style="margin-right: 5px" ><b> Lihat</b></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action', 'foto'])->make(true);
    }
}
