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
	return $this->belongsTo('App\Models\Country\Country', 'Country_ID');
}
public function MemberData(){
	return $this->belongsTo('App\Models\Member\Member', 'Member_ID');
}

public function StationAreaData(){
	return $this->hasMany('App\Models\Station\StationArea', 'Area_ID');
}
















}