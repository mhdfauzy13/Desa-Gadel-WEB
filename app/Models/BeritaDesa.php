<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeritaDesa extends Model
{
    protected $table = 'berita_desas';

    protected $fillable = [
        'judul',
        'gambar',
        'deskripsi',
        'created_by',
    ];
}
