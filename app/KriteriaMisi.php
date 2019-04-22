<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KriteriaMisi extends Model
{
    protected $primaryKey = "id";
     protected $fillable = [
        'kriteria', 
    ];

    public function bobotkriteriamisi()
    {
        return $this->hasMany('App\BobotKriteriaMisi', 'kriteria_id', 'id');
    }


    public function bobotkriteriamisi2()
    {
        return $this->hasMany('App\BobotKriteriaMisi', 'kriteria2_id', 'id');
    }
}
