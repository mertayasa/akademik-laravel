<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public $table = 'kelas';
    protected $fillable = [
        'kode',
        'jenjang',
        'status',
    ];

    public function anggota_kelas()
    {
        return $this->hasMany('App\Models\AnggotaKelas', 'id_kelas');
    }

    public function wali_kelas()
    {
        return $this->hasMany('App\Models\WaliKelas', 'id_kelas');
    }

    public function getWaliKelas($id_tahun_ajar)
    {
        return $this->wali_kelas()->where('id_kelas', $this->id)->where('id_tahun_ajar', $id_tahun_ajar)->get();
    }

    public function getAnggotaKelas($id_tahun_ajar)
    {
        return  $this->anggota_kelas()->where('id_kelas',  $this->id)->where('id_tahun_ajar', $id_tahun_ajar)->get();
    }
}
