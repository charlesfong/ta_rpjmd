<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EigenKriteriaIndikator extends Model
{
    protected $fillable = [
        'eigen', 'kriteria_id', 'user_id'
    ];


    public function kriteria()
    {
        return $this->belongsTo('App\KriteriaIndikator', 'id', 'kriteria_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
