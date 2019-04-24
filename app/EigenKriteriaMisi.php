<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EigenKriteriaMisi extends Model
{
     protected $fillable = [
        'eigen', 'kriteria_id', 'user_id'
    ];


    public function kriteria()
    {
        return $this->belongsTo('App\KriteriaMisi');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
