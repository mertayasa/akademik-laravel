<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    public $table = 'absensi';

    protected $fillable = [
        'id_anggota_kelas',
        'tgl_absensi',
        'kehadiran',
        'semester',
    ];

    public function scopeAbsensiAnggotaGanjil($query, $id_anggota_kelas)
    {
        return $query->where('semester', 'ganjil')->whereIn('id_anggota_kelas', $id_anggota_kelas)->orderBy('tgl_absensi', 'ASC');
    }

    public function scopeAbsensiAnggotaGenap($query, $id_anggota_kelas)
    {
        return $query->where('semester', 'genap')->whereIn('id_anggota_kelas', $id_anggota_kelas)->orderBy('tgl_absensi', 'ASC');
    }

    public function scopeAbsensiAnggota($query, $id_anggota_kelas)
    {
        return $query->whereIn('id_anggota_kelas', $id_anggota_kelas)->orderBy('tgl_absensi', 'ASC');
    }
}
