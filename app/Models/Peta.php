<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peta extends Model
{
    protected $fillable = ['utara', 'timur', 'selatan', 'barat', 'luas', 'jumlah_penduduk'];
}
