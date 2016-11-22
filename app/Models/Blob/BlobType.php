<?php

namespace App\Models\Blob;

use Illuminate\Database\Eloquent\Model;

class BlobType extends Model
{
	protected $primaryKey='BlobType_ID';
    public $timestamps = false;

//hasmany
	public function PersonData(){
	return $this->hasMany('Person', 'BlobType_ID');
}













}
