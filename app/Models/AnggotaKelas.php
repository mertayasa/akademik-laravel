<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKelas extends Model
{
    use HasFactory;

    use HasFactory;
    public $with = [
        'kelas', 'tahun_ajar', 'siswa'
    ];


    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }
    public function tahun_ajar()
    {
        return $this->belongsTo('App\Models\TahunAjar', 'id_tahun_ajar');
    }
    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa', 'id_siswa');
    }
}
