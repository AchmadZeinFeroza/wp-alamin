<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'training';
    protected $fillable = [
        'simpanan', 'pinjaman' , 'cicilan' , 'keperluan','status'
    ];
}
