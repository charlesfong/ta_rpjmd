<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KriteriaSasaran extends Model
{
     protected $primaryKey = "id";
     protected $fillable = [
        'kriteria', 
    ];

    public function bobotkriteriamisi()
    {
        return $this->hasMany('App\BobotKriteriaSasaran', 'kriteria_id', 'id');
    }

    public function bobotkriteriamisi2()
    {
        return $this->hasMany('App\BobotKriteriaSasaran', 'kriteria2_id', 'id');
    }

    public function eigenkriteriamisi()
    {
        return $this->hasMany('App\EigenKriteriaSasaran', 'kriteria_id', 'id');
    }

    public function eigenmisi()
    {
        return $this->hasMany('App\EigenSasaran');
    }

    public function bobotsasaran()
    {
        return $this->hasMany('App\BobotSasaran');
    }
}
