<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class UserDataTable
{
    static public function set($user, $level)
    {
        return Datatables::of($user, $level)
            ->addColumn('action', function ($user) use ($level) {
                return
                    '<div class="btn-group">' .
                    '<a href="' . route($level . '.edit', $user->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                    '<a href="' . route($level . '.show', $user->id) . '" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat" style="margin-right: 5px" ><i class="menu-icon fa fa-info"></i></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
