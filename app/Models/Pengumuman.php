<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Pengumuman extends Model
{
    use HasFactory;
    public $table = 'pengumuman';

    protected $fillable = [
        'judul',
        // 'deskripsi',
        'konten',
        'lampiran',
        'status',
    ];

    public function getLampiran()
    {
        $image_path = 'images/'.$this->attributes['lampiran'];
        $isExists = File::exists(public_path($image_path));
        if ($isExists and $this->attributes['lampiran'] != '') {
            return asset($image_path);
        }

        return null;
    }

}
