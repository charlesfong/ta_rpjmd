<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BobotIndikator extends Model
{
    protected $fillable = [
        'bobot', 'indikator_id', 'indikator2_id', 'user_id', 'kriteria_id'
    ];


    public function indikator()
    {
        return $this->belongsTo('App\Indikator');
    }
    public function indikator2()
    {
        return $this->belongsTo('App\Indikator');
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
