<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EigenKriteriaSasaran extends Model
{
    protected $fillable = [
        'eigen', 'kriteria_id', 'user_id'
    ];


    public function kriteria()
    {
        return $this->belongsTo('App\KriteriaSasaran', 'id', 'kriteria_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
