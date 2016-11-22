<?php

namespace App\Models\Person;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	protected $table = 'persons';
    protected $primaryKey='Person_ID';
    //public $timestamps = false;

//hasone
public function MemberData(){
    return $this->HasOne('App\Models\Member\Member', 'Person_ID');
}

//belongsTo
public function BlobTypeData(){
	return $this->belongsTo('BlobType', 'BlobType_ID');
}
public function CountryData(){
	return $this->belongsTo('Country', 'Country_ID');
}
}
