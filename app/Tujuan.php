<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    public function bobotkriteriatujuan()
    {
        return $this->hasMany('App\BobotTujuan', 'tujuan_id', 'id');
    }
    public function bobotkriteriatujuan2()
    {
        return $this->hasMany('App\BobotTujuan', 'tujuan2_id', 'id');
    }
    public function eigentujuan()
    {
        return $this->hasMany('App\EigenTujuan');
    }
}
