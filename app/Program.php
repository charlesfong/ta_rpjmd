<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'program', 'sasaran_id', 'user_id'
    ];


    public function sasaran()
    {
        return $this->belongsTo('App\Sasaran');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function kegiatan()
    {
        return $this->hasMany('App\Kegiatan');
    }
}
