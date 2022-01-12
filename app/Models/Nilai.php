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
        'nilai',
        // 'tugas',
        // 'uts',
        // 'uas',
        'desk_pengetahuan',
        'desk_keterampilan',
    ];

    public $with = [
        'anggota_kelas', 'jadwal', 'mapel'
    ];

    static function getUniqueMapel($query, $anggota_kelas)
    {
        $nilai_with_mapel = $query->whereIn('id_anggota_kelas', $anggota_kelas)->get()->unique('id_mapel');
        $mapel_of_nilai = $nilai_with_mapel->map(function($nilai){
            return $nilai->mapel;
        });

        return $mapel_of_nilai;
    }

    public function anggota_kelas()
    {
        return $this->belongsTo('App\Models\AnggotaKelas', 'id_anggota_kelas');
    }

    public function jadwal()
    {
        return $this->belongsTo('App\Models\Jadwal', 'id_jadwal');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Models\Mapel', 'id_mapel');
    }
}
