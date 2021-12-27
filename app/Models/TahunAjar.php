<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjar extends Model
{
    use HasFactory;
    public $table = 'tahun_ajar';

    protected $fillable = [
        'keterangan',
        'tahun_mulai',
        'tahun_selesai',
        'status',	
    ];
}
