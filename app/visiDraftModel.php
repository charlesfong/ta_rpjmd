<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visiDraftModel extends Model
{
    public $timestamps = false;
    protected $table = 'visi_draft';
    protected $primaryKey='id';
	protected $fillable=['isi_visi','id_kd'];
}
