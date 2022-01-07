<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CIcilan extends Model
{
    protected $table = 'kategori_cicilan';
    protected $fillable = [
        'nama'
    ];
}
