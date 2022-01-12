<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kelas',
        'id_siswa',
        'id_tahun_ajar',
        'status'
    ];

    use HasFactory;
    public $with = [
        'kelas', 'tahun_ajar', 'siswa'
    ];

    public function scopeByKelasAndTahun($query, $id_kelas, $id_tahun_ajar)
    {
        return $query->where('id_kelas', $id_kelas)->where('id_tahun_ajar', $id_tahun_ajar);
    }

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

    public function absensi()
    {
        return $this->hasMany('App\Models\Absensi', 'id_anggota_kelas');
    }

    public function nilai()
    {
        return $this->hasMany('App\Models\Nilai', 'id_anggota_kelas');
    }

    public function nilai_ekskul()
    {
        return $this->hasMany('App\Models\NilaiEkskul', 'id_anggota_kelas');
    }

    public function nilai_kesehatan()
    {
        return $this->hasMany('App\Models\NilaiKesehatan', 'id_anggota_kelas');
    }

    public function nilai_proporsi()
    {
        return $this->hasMany('App\Models\NilaiProporsi', 'id_anggota_kelas');
    }

    public function nilai_sikap()
    {
        return $this->hasMany('App\Models\NilaiSikap', 'id_anggota_kelas');
    }

    public function getAbsensiByDate($tgl, $return_full_status = false)
    {
        $absensi = $this->absensi->where('tgl_absensi', $tgl)->first();
        if($return_full_status){
            return isset($absensi) ? $absensi->kehadiran : 'alpa';
        }

        return isset($absensi) ? ucfirst(substr($absensi->kehadiran, 0, 1)) : 'A';
    }
}
