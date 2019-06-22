<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tujuan extends Model
{
    protected $fillable = [
        'tujuan', 'misi_id', 'user_id'
    ];


    public function misi()
    {
        return $this->belongsTo('App\Misi');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function sasaran()
    {
        return $this->hasMany('App\Sasaran');
    }
    public function bobottujuan()
    {
        return $this->hasMany('App\BobotTujuan');
    }
    public function bobotkriteriamisi()
    {
        return $this->hasMany('App\BobotTujuan', 'tujuan_id', 'id')->where('user_id', Auth::user()->id);
    }
    public function bobotkriteriamisi2()
    {
        return $this->hasMany('App\BobotTujuan', 'tujuan2_id', 'id')->where('user_id', Auth::user()->id);
    }
    public function eigenmisi()
    {
        return $this->hasMany('App\EigenTujuan', 'tujuan_id', 'id');
    }
}
