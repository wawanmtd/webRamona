<?php

namespace App\Models\Station;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $primaryKey='Station_ID';
    public $timestamps = false;


//belongsto
public function CountryData(){
	return $this->belongsTo('App\Models\Country\Country', 'Country_ID');
}
public function StationTypeData(){
	return $this->belongsTo('App\Models\Station\StationType', 'StationType_ID');
}
public function MemberData(){
	return $this->belongsTo('App\Models\Member\Member', 'Member_ID');
}










}