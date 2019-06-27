<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KriteriaIndikator extends Model
{
    protected $primaryKey = "id";
    protected $fillable = [
        'kriteria', 
    ];

    public function bobotkriteriamisi()
    {
        return $this->hasMany('App\BobotKriteriaIndikator', 'kriteria_id', 'id');
    }

    public function bobotkriteriamisi2()
    {
        return $this->hasMany('App\BobotKriteriaIndikator', 'kriteria2_id', 'id');
    }

    public function eigenkriteriamisi()
    {
        return $this->hasMany('App\EigenKriteriaIndikator', 'kriteria_id', 'id');
    }

    // public function eigenmisi()
    // {
    //     return $this->hasMany('App\EigenIndikator');
    // }

    // public function bobotindikator()
    // {
    //     return $this->hasMany('App\BobotIndikator');
    // }
}
