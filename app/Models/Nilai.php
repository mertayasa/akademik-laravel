<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    public $table = 'nilai';
    
    protected $fillable = [
        'id_anggota_kelas',
        'id_mapel',
        'semester',
        'tugas',
        'uts',
        'uas',
        'desk_pengetahuan',
        'desk_keterampilan',
    ];

    public $with = [
        'anggota_kelas', 'jadwal'
    ];


    public function anggota_kelas()
    {
        return $this->belongsTo('App\Models\AnggotaKelas', 'id_anggota_kelas');
    }
    public function jadwal()
    {
        return $this->belongsTo('App\Models\Jadwal', 'id_jadwal');
    }
}
