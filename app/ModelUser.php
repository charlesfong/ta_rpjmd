<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelUser extends Model
{
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $timestamps = false;
    protected $table = 'users';
    protected $primaryKey='id';
	protected $fillable=['username','full_name','password','category','remember_token'];
}
