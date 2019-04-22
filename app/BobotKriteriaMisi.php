<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BobotKriteriaMisi extends Model
{
    protected $primaryKey = "id";
    protected $fillable = [
        'bobot', 'kriteria_id', 'kriteria2_id', 'user_id'
    ];


    public function kriteria()
    {
        return $this->belongsTo('App\KriteriaMisi');
    }
    public function kriteria2()
    {
        return $this->belongsTo('App\KriteriaMisi');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
