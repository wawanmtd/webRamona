<?php

namespace App\Models\Area;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $primaryKey = 'Area_ID';
    public $timestamps = false;


////////////////////////////////
//belongsTo
////////////////////////////////
public function CountryData(){
	return $this->belongsTo('Country', 'Country_ID');
}
public function MemberData(){
	return $this->belongsTo('Member', 'Member_ID');
}
















}