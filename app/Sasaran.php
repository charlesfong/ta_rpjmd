<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sasaran extends Model
{
    protected $fillable = [
        'sasaran', 'tujuan_id', 'user_id'
    ];


    public function tujuan()
    {
        return $this->belongsTo('App\Tujuan');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function program()
    {
        return $this->hasMany('App\Program');
    }
}
