<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    use HasFactory;
    public $table = 'saran';

    protected $fillable = [
        'id_anggota_kelas',
        'semester',
        'keterangan',
    ];
}
