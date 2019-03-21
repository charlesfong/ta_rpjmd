<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tujuanDraftModel extends Model
{
    public $timestamps = false;
    protected $table = 'tujuan_draft';
    protected $primaryKey='id';
	protected $fillable=['id_visi','id_misi','id_bappeda','isi_tujuan'];
	// protected $searchableColumns = ['nama'];
}
