<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    static $admin = 'admin';
    static $guru = 'guru';
    static $ortu = 'ortu';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function siswa()
    {
        return $this->hasMany('App\Models\Siswa', 'id_user');
    }


    public function anggota_kelas()
    {
        return $this->hasManyThrough(AnggotaKelas::class, Siswa::class, 'id_user', 'id_siswa');
    }

    public function kelas()
    {
        return $this->hasManyThrough(Kelas::class, WaliKelas::class, 'id_user', 'id_user');
    }
}
