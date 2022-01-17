<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    public $table = 'prestasi';

    public $with = [
        'anggota_kelas'
    ];

    protected $fillable = [
        'id_anggota_kelas',
        'semester',
        'jenis',
        'keterangan',	
    ];

    public function anggota_kelas()
    {
        return $this->belongsTo('App\Models\AnggotaKelas', 'id_anggota_kelas');
    }
}
