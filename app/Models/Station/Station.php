<?php
namespace App\Models\Station;
use Illuminate\Database\Eloquent\Model;
class Station extends Model
{
    protected $primaryKey='Station_ID';
    public $timestamps = false;
//belongsto
public function CountryData(){
	return $this->belongsTo('App\Models\Country\Country', 'Country_ID');
}
public function StationTypeData(){
	return $this->belongsTo('App\Models\Station\StationType', 'StationType_ID');
}
public function MemberData(){
	return $this->belongsTo('App\Models\Member\Member', 'Member_ID');
}
public function DeviceInStationData(){
	return $this->belongsTo('App\Models\Device\DeviceInStation', 'Station_ID');
}
//has
public function StationAreaData(){
	return $this->hasOne('App\Models\Station\StationArea','Station_ID');
}

//scope
public function scopeStationWhereMemberId($query,$id){
	return $query->where('Member_ID',$id);
}
}