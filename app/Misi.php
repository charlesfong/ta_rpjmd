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
    public function indikator()
    {
        return $this->hasMany('App\Indikator');
    }
    public function tujuanSort()
    {
        return $this->hasMany('App\Tujuan')->orderBy('bobot', 'desc');
    }
    public function indikatorSort()
    {
        return $this->hasMany('App\Indikator')->orderBy('bobot', 'desc');
    }
    public function bobotmisi()
    {
        return $this->hasMany('App\BobotMisi');
    }
    public function bobotkriteriamisi()
    {
        return $this->hasMany('App\BobotMisi', 'misi_id', 'id');
    }
    public function bobotkriteriamisi2()
    {
        return $this->hasMany('App\BobotMisi', 'misi2_id', 'id');
    }
    public function eigenmisi()
    {
        return $this->hasMany('App\EigenMisi');
    }
}
