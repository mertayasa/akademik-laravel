<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;
    public $table = 'ekskul';
    
    protected $fillable = [
        'nama',
        'status'
    ];
}
