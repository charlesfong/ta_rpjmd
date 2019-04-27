<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EigenMisi extends Model
{
    protected $fillable = [
        'eigen', 'misi_id', 'user_id', 'kriteria_id'
    ];


    public function misi()
    {
        return $this->belongsTo('App\Misi');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function kriteria()
    {
        return $this->belongsTo('App\Kriteria');
    }
}
