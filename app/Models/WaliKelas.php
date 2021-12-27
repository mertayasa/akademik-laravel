<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliKelas extends Model
{
    use HasFactory;
    public $table = 'wali_kelas';

    public $with = [
        'user', 'kelas', 'tahun_ajar',
    ];

    protected $fillable = [
        'id_tahun_ajar',
        'id_kelas',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }
    public function tahun_ajar()
    {
        return $this->belongsTo('App\Models\TahunAjar', 'id_tahun_ajar');
    }

    public function getJumlahSiswaAttribute()
    {
        $jumlah = AnggotaKelas::where('id_kelas', $this->id_kelas)->where('id_tahun_ajar', $this->tahun_ajar)->count();

        return $jumlah;
    }
}
