<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    public $table = 'mapel';

    protected $fillable = [
        'nama',
        'is_lokal',
        'status',
    ];

    public function getIsLokalAttribute()
    {
        return $this->attributes['is_lokal'] == 'true' ? true : false;
    }
}
