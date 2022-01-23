<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    public $table = 'jadwal';
    protected $fillable = [
        'id_guru',
        'id_kelas',
        'id_mapel',
        'id_tahun_ajar',
        'jam_mulai',
        'jam_selesai',
        'hari',
        'kode_hari',
        'status',
    ];

    public $with = [
        'guru', 'kelas', 'tahun_ajar', 'mapel'
    ];

    public function getJamMulaiAttribute()
    {
        return Carbon::parse($this->attributes['jam_mulai'])->format('H:i');
    }

    public function getJamSelesaiAttribute()
    {
        return Carbon::parse($this->attributes['jam_selesai'])->format('H:i');
    }

    public function guru()
    {
        return $this->belongsTo('App\Models\User', 'id_guru');
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

    static function geetUniqueMapel($id_tahun_ajar, $id_kelas)
    {
        $jadwal = self::where('id_tahun_ajar', $id_tahun_ajar)->where('id_kelas', $id_kelas)->get()->unique('id_mapel');
        $unique_mapel = $jadwal->map(function($jadwal){
            return $jadwal->mapel;
        });

        return $unique_mapel;
    }
}
