<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    public $with = [
        'user', 'kelas', 'tahun_ajar', 'mapel'
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
    public function mapel()
    {
        return $this->belongsTo('App\Models\Mapel', 'id_mapel');
    }
}
