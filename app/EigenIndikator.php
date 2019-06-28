<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EigenIndikator extends Model
{
    protected $fillable = [
        'eigen', 'indikator_id', 'user_id', 'kriteria_id'
    ];


    public function indikator()
    {
        return $this->belongsTo('App\Indikator', 'id', 'indikator_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function kriteria()
    {
        return $this->belongsTo('App\KriteriaIndikator', 'kriteria_id', 'id');
    }
}
