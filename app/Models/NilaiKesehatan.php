<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKesehatan extends Model
{
    use HasFactory;
    public $table = 'nilai_kesehatan';

    public $with = [
        'anggota_kelas'
    ];

    protected $fillable = [
        'id_anggota_kelas',
        'semester',
        'jenis_kesehatan',
        'keterangan',
    ];


    public function anggota_kelas()
    {
        return $this->belongsTo('App\Models\AnggotaKelas', 'id_anggota_kelas');
    }
}
