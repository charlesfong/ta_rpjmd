<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Visi extends Model
{
    protected $fillable = [
        'visi', 'user_id', 
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function misi()
    {
        return $this->hasMany('App\Misi');
    }
    public function misiSort()
    {
        return $this->hasMany('App\Misi')->orderBy('bobot', 'desc');
    }
}
