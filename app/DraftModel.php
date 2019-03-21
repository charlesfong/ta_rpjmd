<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DraftModel extends Model
{
    public $timestamps = false;
    protected $table = 'draft';
    protected $primaryKey='id';
}
