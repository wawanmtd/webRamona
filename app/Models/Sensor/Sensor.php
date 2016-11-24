<?php

namespace App\Models\Sensor;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $primaryKey='Sensor_ID';
    public $timestamps = false;


//belongsto
public function DeviceData(){
	// return $this->belongstoMany('App\Models\Device\Device', 'device_sensors', 'Sensor_ID', 'Device_ID', 'Member_ID');

}
public function SensorTypeData(){
	return $this->belongsTo('App\Models\Sensor\SensorType', 'SensorType_ID');
}
public function MemberData(){
	return $this->belongsTo('App\Models\Member\Member', 'Member_ID');
}


//sementara, belongstomany nya belum berhasil
public function DeviceSensorData(){
	return $this->belongsto('App\Models\Device\DeviceSensor', 'Sensor_ID');
}












}
