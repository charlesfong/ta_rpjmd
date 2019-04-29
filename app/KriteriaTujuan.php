<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KriteriaTujuan extends Model
{
    protected $primaryKey = "id";
     protected $fillable = [
        'kriteria', 
    ];

    public function bobotkriteriamisi()
    {
        return $this->hasMany('App\BobotKriteriaTujuan', 'kriteria_id', 'id');
    }

    public function bobotkriteriamisi2()
    {
        return $this->hasMany('App\BobotKriteriaTujuan', 'kriteria2_id', 'id');
    }

    public function eigenkriteriatujuan()
    {
        return $this->hasMany('App\EigenKriteriaTujuan', 'kriteria_id', 'id');
    }

    public function eigentujuan()
    {
        return $this->hasMany('App\EigenTujuan');
    }

    public function bobottujuan()
    {
        return $this->hasMany('App\BobotTujuan');
    }
}
