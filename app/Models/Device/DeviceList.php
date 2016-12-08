<?php

namespace App\Models\Device;

use Illuminate\Database\Eloquent\Model;

class DeviceList extends Model
{
    protected $primaryKey='DeviceList_ID';
    public $timestamps = false;

    //belongs
    public function DeviceData(){
    	return $this->belongsTo('App\Device\Device', 'Device_ID');
    }
    public function DeviceStatus(){
    	return $this->belongsTo('App\Device\DeviceStatus','DeviceStatus_ID');
    }

    //has
    public function DeviceInStationData(){
    	return $this->hasOne('App\Device\DeviceInStation', 'DeviceList_ID');
    }










}
