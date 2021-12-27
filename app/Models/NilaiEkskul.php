<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiEkskul extends Model
{
    use HasFactory;
    public $table = 'nilai_ekskul';

    public $with = [
        'anggota_kelas', 'ekskul'
    ];

    protected $fillable = [
        'id_anggota_kelas',
        'id_ekskul',
        'semester',
        'keterangan',
    ];

    public function anggota_kelas()
    {
        return $this->belongsTo('App\Models\AnggotaKelas', 'id_anggota_kelas');
    }
    public function ekskul()
    {
        return $this->belongsTo('App\Models\Ekskul', 'id_ekskul');
    }
}
