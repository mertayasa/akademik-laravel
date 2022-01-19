<?php

use App\Models\TahunAjar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

function formatPrice($value)
{
    return 'Rp ' . number_format($value, 0, ',', '.');
}

function isActive($param)
{
    if (is_array($param)) {
        foreach ($param as $par) {
            if (Request::route()->getPrefix() == '/' . $par) {
                return 'active';
            }
        }
    } else {
        return Request::route()->getPrefix() == '/' . $param ? 'active' : '';
    }

    return '';
}

function showFor($roles)
{
    foreach ($roles as $role) {
        if (roleName() == $role) {
            return true;
        }
    }

    return false;
}

function roleName($level = null)
{
    $role_name = ($level ?? Auth::user()->level) == User::$admin ? 'admin' : (($level ?? Auth::user()->level) == User::$guru ? 'guru' : User::$ortu);

    return $role_name;
}

function authUser()
{
    return Auth::user();
}

function indonesianDate($date)
{
    return Carbon::parse($date)->isoFormat('LL');
}

function getAge($date)
{
    $birth_date = Carbon::parse($date);
    $now = Carbon::now();

    return $birth_date->diffInYears($now);
}

function isLokal($gender)
{
    return $gender == 'true' ? 'Muatan Lokal' : 'Bukan Muatan Lokal';
}

function getStatus($status)
{
    return $status == 1 ? '<span class="badge badge-primary">Aktif</span>' : '<span class="badge badge-secondary">Nonaktif</span>';
}

function uploadFile($base_64_foto, $folder)
{
    try {
        $foto = base64_decode($base_64_foto['data']);
        $folderName = 'images/' . $folder;

        if (!file_exists($folderName)) {
            mkdir($folderName, 0755, true);
        }

        $safeName = time() . $base_64_foto['name'];
        $inventoriePath = public_path() . '/' . $folderName;
        file_put_contents($inventoriePath . '/' . $safeName, $foto);
    } catch (Exception $e) {
        Log::info($e->getMessage());
        return 0;
    }

    return $folder . '/' . $safeName;
}

function getDayCode($day)
{
    switch(strtolower($day)){
        case 'senin':
            return 1;
        break;
        case 'selasa':
            return 2;
        break;
        case 'rabu':
            return 3;
        break;
        case 'kamis':
            return 4;
        break;
        case 'jumat':
            return 5;
        break;
        case 'sabtu':
            return 6;
        break;
        case 'minggu':
            return 7;
        break;
    }
}

function getHari()
{
    return [
        '1' => 'Senin',
        '2' => 'Selasa',
        '3' => 'Rabu',
        '4' => 'Kamis',
        '5' => 'Jumat',
        '6' => 'Sabtu',
        '7' => 'Minggu',
    ];
}

function getSemester($tgl, $id_tahun_ajar)
{
    $tahun_ajar = TahunAjar::find($id_tahun_ajar);
    if($tgl >= $tahun_ajar->mulai_smt_ganjil && $tgl <= $tahun_ajar->selesai_smt_ganjil){
        return 'ganjil';
    }
    else if($tgl >= $tahun_ajar->mulai_smt_genap && $tgl <= $tahun_ajar->selesai_smt_genap){
        return 'genal';
    }else{
        return false;
    }
}

function getSemesterName($semester)
{
    return $semester == 'ganjil' ? '1 (Satu)' : '2 (Dua)';
}


function getPredikatNilai($nilai)
{
    switch($nilai){
        case $nilai > 0 and $nilai <= 60:
            return 'D';
        break;
        case $nilai > 60 and $nilai <= 70:
            return 'C';
        break;
        case $nilai > 70 and $nilai <= 85:
            return 'B';
        break;
        case $nilai > 85 and $nilai <= 90:
            return 'B+';
        break;
        case $nilai > 90:
            return 'A';
        break;
    }
}


function province()
{
    return "Bali";
}

