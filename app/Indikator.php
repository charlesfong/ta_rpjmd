<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $fillable = [
        'indikator', 'n-2', 'n', 'n+1', 'n+2', 'n+3', "kondisi_akhir"
    ];


    public function tujuan()
    {
        return $this->belongsTo('App\Tujuan');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
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
