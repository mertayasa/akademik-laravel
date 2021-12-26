<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $dashboard_data = $this->generateDashboardData();
        return view('dashboard.index', compact('dashboard_data'));
    }

    public function generateDashboardData()
    {
        $siswa_count = Siswa::where('status', 'aktif')->count();
        $guru_count = User::where('status', 'aktif')->where('level', 'guru')->count();
        $ortu_count = User::where('status', 'aktif')->where('level', 'ortu')->count();
        $mapel_count = Mapel::where('status', 'aktif')->count();
        $pengumuman = Pengumuman::where('status', 'aktif')->get();


        $dashboard_data = [
            'siswa_count' => $siswa_count,
            'guru_count' => $guru_count,
            'ortu_count' => $ortu_count,
            'mapel_count' => $mapel_count,
            'pengumuman' => $pengumuman

        ];

        return $dashboard_data;
    }

    public function pengumuman()
    {
        return view('dashboard.pengumuman');
    }
}
