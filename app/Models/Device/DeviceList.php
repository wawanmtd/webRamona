<?php

namespace App\Models\Device;

use Illuminate\Database\Eloquent\Model;

class DeviceList extends Model
{
    protected $primaryKey='DeviceList_ID';
    public $timestamps = false;

    //belongs
    public function DeviceData(){
    	return $this->belongsTo('App\Models\Device\Device', 'Device_ID');
    }
    public function DeviceStatusData(){
    	return $this->belongsTo('App\Models\Device\DeviceStatus','DeviceStatus_ID');
    }
    public function MemberData(){
        return $this->belongsTo('App\Models\Member\Member','Member_ID');
    }

    //has
    public function DeviceInStationData(){
    	return $this->hasOne('App\Models\Device\DeviceInStation', 'DeviceList_ID');
    }










}
