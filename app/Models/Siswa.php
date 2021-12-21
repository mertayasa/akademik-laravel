<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;


    public $with = [
        'user'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
