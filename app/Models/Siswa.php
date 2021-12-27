<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    public $table = 'siswa';

    public $with = [
        'user'
    ];

    protected $fillable = [
        'nama',
        'nis',
        'email',
        'alamat',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'id_user',
        'status',	
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
