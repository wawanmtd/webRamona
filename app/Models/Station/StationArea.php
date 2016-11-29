<?php

namespace App\Models\Station;

use Illuminate\Database\Eloquent\Model;

class StationArea extends Model
{
    protected $primaryKey='StationArea_ID';
    public $timestamps = false;

//belongs
    //harusnya pake pivot di station biar lebih praktis
    public function AreaData(){
    	return $this->belongsTo('App\Models\Area\Area', 'Area_ID');
    }

//has
    public function StationData(){
    	return $this->belongsTo('App\Models\Station\Station', 'Station_ID');
    }















}
