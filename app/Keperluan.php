<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keperluan extends Model
{
    protected $table = 'kategori_keperluan';
    protected $fillable = [
        'nama'
    ];
}
