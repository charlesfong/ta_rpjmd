<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EigenTujuan extends Model
{
    protected $fillable = [
        'eigen', 'tujuan_id', 'user_id', 'kriteria_id'
    ];


    public function tujuan()
    {
        return $this->belongsTo('App\Tujuan', 'id', 'tujuan_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function kriteria()
    {
        return $this->belongsTo('App\KriteriaTujuan', 'kriteria_id', 'id');
    }
}
