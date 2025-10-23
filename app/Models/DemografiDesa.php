<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemografiDesa extends Model
{
    use HasFactory;

    protected $table = 'demografi_desas';

    protected $fillable = [
        'dusun',
        'laki_laki',
        'perempuan',
        'total',
        'tahun',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->total = ($model->laki_laki ?? 0) + ($model->perempuan ?? 0);
        });
    }
}
