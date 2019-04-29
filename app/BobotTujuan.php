<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BobotTujuan extends Model
{
    protected $fillable = [
        'bobot', 'tujuan_id', 'tujuan2_id', 'user_id', 'kriteria_id'
    ];


    public function tujuan()
    {
        return $this->belongsTo('App\Tujuan');
    }
    public function tujuan2()
    {
        return $this->belongsTo('App\Tujuan');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function kriteria()
    {
        return $this->belongsTo('App\Kriteria');
    }
}
