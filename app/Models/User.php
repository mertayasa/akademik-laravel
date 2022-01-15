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
        'nip',
        'alamat',
        'tempat_lahir',
        'tgl_lahir',
        'no_tlp',
        'pekerjaan',
        'jenis_kelamin',
        'status_guru',
        'level',
        'status',
        'email',	
        'password',
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

    public function scopeOrtu($query)
    {
        return $query->where('level', self::$ortu);
    }

    public function scopeAdmin($query)
    {
        return $query->where('level', self::$admin);
    }

    public function scopeGuru($query)
    {
        return $query->where('level', self::$guru);
    }

    public function siswa()
    {
        return $this->hasMany('App\Models\Siswa', 'id_user');
    }

    public function isAdmin()
    {
        return $this->attributes['level'] == self::$admin ? true : false;    
    }

    public function isOrtu()
    {
        return $this->attributes['level'] == self::$ortu ? true : false;    
    }

    public function isGuru()
    {
        return $this->attributes['level'] == self::$guru ? true : false;    
    }

    public function isWali()
    {
        if($this->attributes['level'] == self::$guru){
            $tahun_ajar_active = TahunAjar::where('status', 'aktif')->first();
            if($this->wali_kelas->where('id_tahun_ajar', $tahun_ajar_active->id)->count() > 0){
                return true;
            }
        }

        return false;
    }

    public function anggota_kelas()
    {
        return $this->hasManyThrough(AnggotaKelas::class, Siswa::class, 'id_user', 'id_siswa');
    }

    public function wali_kelas()
    {
        return $this->hasMany(WaliKelas::class, 'id_user');
    }

    public function kelas()
    {
        return $this->hasManyThrough(Kelas::class, WaliKelas::class, 'id_user', 'id_user');
    }
}
