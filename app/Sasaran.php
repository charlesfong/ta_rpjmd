<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Sasaran extends Model
{
    protected $fillable = [
        'sasaran', 'tujuan_id', 'user_id'
    ];


    public function tujuan()
    {
        return $this->belongsTo('App\Tujuan');
    }
    public function indikator()
    {
        return $this->hasMany('App\Indikator');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function indikatorSort()
    {
        return $this->hasMany('App\Indikator')->orderBy('bobot', 'desc');
    }
    public function bobotsasaran()
    {
        return $this->hasMany('App\BobotSasaran');
    }
    public function bobotkriteriamisi()
    {
        return $this->hasMany('App\BobotSasaran', 'sasaran_id', 'id')->where('user_id', Auth::user()->id);
    }
    public function bobotkriteriamisi2()
    {
        return $this->hasMany('App\BobotSasaran', 'sasaran2_id', 'id')->where('user_id', Auth::user()->id);
    }
    public function eigenmisi()
    {
        return $this->hasMany('App\EigenSasaran', 'sasaran_id', 'id');
    }
}
