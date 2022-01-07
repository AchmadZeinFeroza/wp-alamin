<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';
    protected $fillable = [
        'nomor', 'nama', 'simpanan_id', 'pinjaman_id' , 'cicilan_id' , 'keperluan_id','status_id'
    ];

    public function simpanan(){return $this->belongsTo('App\Simpanan');}
    public function pinjaman(){return $this->belongsTo('App\Pinjaman');}
    public function cicilan(){return $this->belongsTo('App\Cicilan');}
    public function keperluan(){return $this->belongsTo('App\Keperluan');}
    public function status(){return $this->belongsTo('App\Status');}
}
