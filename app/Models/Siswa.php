<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

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
        'foto',
        'agama',
        'sikap_spiritual',
        'sikap_sosial',
        'saran',
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function getFoto()
    {
        $image_path = 'images/'.$this->attributes['foto'];
        $isExists = File::exists(public_path($image_path));
        if ($isExists and $this->attributes['foto'] != '') {
            return asset($image_path);
        } else {
            return asset('images/default/default_profil.png');
        }
    }
}
