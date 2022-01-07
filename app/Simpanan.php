<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    protected $table = 'kategori_simpanan';
    protected $fillable = [
        'nama'
    ];
}
