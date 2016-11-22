<?php

namespace App\Models\Country;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $primaryKey='Country_ID';
    public $timestamps = false;


//hasmany
public function AreaData(){
	return $this->hasMany('App\Models\Area\Area', 'Country_ID');
}
public function StationData(){
	return $this->hasMany('App\Models\Station\Station', 'Country_ID');
}
public function DeviceData(){
	return $this->hasMany('App\Models\Device\Device', 'Country_ID');
}
public function PersonData(){
	return $this->hasMany('App\Models\Person\Person', 'Country_ID');
}
public function VendorData(){
	return $this->hasMany('App\Models\Vendor\Vendor', 'Country_ID');
}















}