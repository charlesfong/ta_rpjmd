<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BobotKriteriaTujuan extends Model
{
    protected $primaryKey = "id";
    protected $fillable = [
        'bobot', 'kriteria_id', 'kriteria2_id', 'user_id'
    ];


    public function kriteria()
    {
        return $this->belongsTo('App\KriteriaTujuan');
    }
    public function kriteria2()
    {
        return $this->belongsTo('App\KriteriaTujuan');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
