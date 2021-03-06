<?php

namespace App\Models\Device;

use Illuminate\Database\Eloquent\Model;

class DeviceInStation extends Model
{
    protected $primaryKey='DeviceInStation_ID';
    public $timestamps = false;

    //belongs
    public function StationData(){
    	return $this->belongsTo('App\Models\Station\Station', 'Station_ID');
    }

}
