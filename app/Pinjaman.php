<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table = 'kategori_pinjaman';
    protected $fillable = [
        'nama'
    ];
}
