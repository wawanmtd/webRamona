<?php

namespace App\Models\Device;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $primaryKey='Device_ID';
    public $timestamps = false;


//belongsto
public function CountryData(){
	return $this->belongsTo('App\Models\Country\Country', 'Country_ID');
}
public function DocumentTypeData(){
	return $this->belongsTo('App\Models\Types\DocumentType', 'DocumentType_ID');
}
public function MemberData(){
	return $this->belongsTo('App\Models\Member\Member', 'Member_ID');
}

//has
public function DeviceListData(){
	return $this->hasMany('App\Models\Device\DeviceList', 'Device_ID');
}
public function DeviceSensor(){
	return $this->belongsTo('App\Models\Country\Country', 'Country_ID');
}
















}