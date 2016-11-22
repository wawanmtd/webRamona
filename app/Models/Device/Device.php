<?php

namespace App\Models\Device;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $primaryKey='Device_ID';
    public $timestamps = false;


//belongsto
public function CountryData(){
	return $this->belongsTo('Country', 'Country_ID');
}
public function DocumentTypeData(){
	return $this->belongsTo('DocumentType', 'DocumentType_ID');
}

//has
public function DeviceListData(){
	return $this->hasMany('DeviceList', 'Device_ID');
}
public function DeviceSensor(){
	return $this->belongsTo('Country', 'Country_ID');
}
















}