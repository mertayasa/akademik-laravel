<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    // public $with = [
    //     'kelas',
    // ];

    // public function wali_kelas()
    // {
    //     return $this->hasMany('App\Models\WaliKelas', 'id_kelas');
    // }

    // public function kelas()
    // {
    //     return $this->hasOne('App\Models\WaliKelas', 'id');
    // }
}
