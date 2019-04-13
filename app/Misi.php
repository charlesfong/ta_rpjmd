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
        return $this->belongsTo('App\VIsi');
    }
}
