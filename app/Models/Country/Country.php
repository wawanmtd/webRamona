<?php

namespace App\Models\Country;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $primaryKey='Country_ID';
    public $timestamps = false;


//hasmany
public function AreaData(){
	return $this->hasMany('Area', 'Country_ID');
}
public function StationData(){
	return $this->hasMany('Station', 'Country_ID');
}
public function DeviceData(){
	return $this->hasMany('Device', 'Country_ID');
}
public function PersonData(){
	return $this->hasMany('Person', 'Country_ID');
}
public function VendorData(){
	return $this->hasMany('Vendor', 'Country_ID');
}















}