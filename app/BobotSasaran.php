<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BobotSasaran extends Model
{
    protected $fillable = [
        'bobot', 'sasaran_id', 'sasaran2_id', 'user_id', 'kriteria_id'
    ];


    public function sasaran()
    {
        return $this->belongsTo('App\Sasaran');
    }
    public function sasaran2()
    {
        return $this->belongsTo('App\Sasaran');
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
