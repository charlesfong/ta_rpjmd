<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BobotKriteriaIndikator extends Model
{
    protected $primaryKey = "id";
    protected $fillable = [
        'bobot', 'kriteria_id', 'kriteria2_id', 'user_id'
    ];


    public function kriteria()
    {
        return $this->belongsTo('App\KriteriaIndikator');
    }
    public function kriteria2()
    {
        return $this->belongsTo('App\KriteriaIndikator');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
