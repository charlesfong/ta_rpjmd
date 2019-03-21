<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class misiDraftModel extends Model
{
    public $timestamps = false;
    protected $table = 'misi_draft';
    protected $primaryKey='id';
	protected $fillable=['id_visi','isi_misi'];
	// protected $searchableColumns = ['nama'];
}
