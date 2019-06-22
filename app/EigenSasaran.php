<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EigenSasaran extends Model
{
    protected $fillable = [
        'eigen', 'sasaran_id', 'user_id', 'kriteria_id'
    ];


    public function sasaran()
    {
        return $this->belongsTo('App\Sasaran', 'id', 'sasaran_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function kriteria()
    {
        return $this->belongsTo('App\KriteriaSasaran', 'kriteria_id', 'id');
    }
}
