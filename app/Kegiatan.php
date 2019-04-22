<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
        'kegiatan', 'program_id', 'user_id'
    ];


    public function program()
    {
        return $this->belongsTo('App\Program');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
