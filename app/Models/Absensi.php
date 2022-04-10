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

    public function scopeAbsensiKelas($query, $id_kelas, $id_tahun_ajar, $semester = null)
    {
        $param = [
            'id_kelas' => $id_kelas,
            'id_tahun_ajar' => $id_tahun_ajar
        ];

        return $query->with('anggotaKelas')->where($semester == null ? [] : ['semester' => $semester])->whereHas('anggotaKelas', function ($anggota) use($param){
            return $anggota->where($param);
        })->orderBy('tgl_absensi', 'ASC');
    }

    static function periodAbsensi($id_kelas, $id_tahun_ajar, $semester = null)
    {
        $absensi = self::absensiKelas($id_kelas, $id_tahun_ajar, $semester)->get();
        return self::generatePeriod($absensi);
    }

    // Get period of absensi, example : first absensi is 5 Jan, and last is 13 Feb
    // This function will generate all period from 1 Jan to 28/29 Feb
    static function generatePeriod($absensi)
    {
        $group_bulan = [];
        
        $absensi = $absensi->toArray();
        if(count($absensi) > 0){
            $period_ganjil = \Carbon\CarbonPeriod::create(\Carbon\Carbon::parse($absensi[0]['tgl_absensi'])->firstOfMonth(), \Carbon\Carbon::parse(end($absensi)['tgl_absensi'])->endOfMonth());
            $absensi = [];
            $index_count = 1;
            $last_month_name = '';
            foreach ($period_ganjil as $dt) {
                array_push($absensi, ['tanggal' => $dt->format('Y-m-d')]);
                $indo_month_name = getIndonesianMonth($dt->format("Y-m"));
                $group_bulan[$dt->format("Y-m")]['month_name'] = $indo_month_name;
                if($indo_month_name != $last_month_name){
                    $index_count = 1;
                }

                $group_bulan[$dt->format("Y-m")]['count_absen'] = $index_count++;
                $last_month_name = $indo_month_name;
            }
        }

        return [
            'absensi' => $absensi,
            'group_bulan' => $group_bulan,
        ];
    }

    public function anggotaKelas()
    {
        return $this->belongsTo(AnggotaKelas::class, 'id_anggota_kelas');
    }
}
