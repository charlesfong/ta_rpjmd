<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Indikator extends Model
{
    protected $fillable = [
        'indikator', 'n-2', 'n', 'n+1', 'n+2', 'n+3', 'kondisi_akhir', 'misi_id', 'sasaran_id', 'tujuan_id'
    ];


    public function sasaran()
    {
        return $this->belongsTo('App\Sasaran');
    }
    public function tujuan()
    {
        return $this->belongsTo('App\Tujuan');
    }
    public function misi()
    {
        return $this->belongsTo('App\Misi');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function bobotindikator()
    {
        return $this->hasMany('App\BobotIndikator');
    }
    public function bobotkriteriamisi()
    {
        return $this->hasMany('App\BobotIndikator', 'indikator_id', 'id')->where('user_id', Auth::user()->id);
    }
    public function bobotkriteriamisi2()
    {
        return $this->hasMany('App\BobotIndikator', 'indikator2_id', 'id')->where('user_id', Auth::user()->id);
    }
    public function eigenmisi()
    {
        return $this->hasMany('App\EigenIndikator', 'indikator_id', 'id');
    }
}
