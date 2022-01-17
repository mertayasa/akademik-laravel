<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjar extends Model
{
    use HasFactory;
    public $table = 'tahun_ajar';

    static $nonaktif = 'nonaktif';
    static $aktif = 'aktif';

    protected $fillable = [
        'keterangan',
        'tahun_mulai',
        'tahun_selesai',
        'mulai_smt_ganjil',
        'selesai_smt_ganjil',
        'mulai_smt_genap',
        'selesai_smt_genap',
        'status',	
    ];

    public function getDurasiTahunAjarAttribute()
    {
        return $this->attributes['tahun_mulai'].'-'.$this->attributes['tahun_selesai'];
    }
}
