<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Misi extends Model
{
    protected $fillable = [
        'misi', 'visi_id', 
    ];


    public function visi()
    {
        return $this->belongsTo('App\Visi');
    }
    public function tujuan()
    {
        return $this->hasMany('App\Tujuan');
    }
    public function bobotmisi()
    {
        return $this->hasMany('App\BobotMisi');
    }
}
