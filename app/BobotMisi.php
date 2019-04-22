<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BobotMisi extends Model
{
    protected $fillable = [
        'bobot', 'misi_id', 'misi2_id', 'user_id'
    ];


    public function misi()
    {
        return $this->belongsTo('App\Misi');
    }
    public function misi2()
    {
        return $this->belongsTo('App\Misi');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
