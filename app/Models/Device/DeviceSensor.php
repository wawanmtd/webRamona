<?php

namespace App\Models\Device;

use Illuminate\Database\Eloquent\Model;

class DeviceSensor extends Model
{
    protected $primaryKey='DeviceSensor_ID';
    public $timestamps = false;


//belongs
    public function DeviceData(){
    	return $this->belongsto('App\Models\Device\Device', 'Device_ID');
    }











}
