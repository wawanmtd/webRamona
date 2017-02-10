<?php
namespace App\Models\Member;
use Illuminate\Database\Eloquent\Model;
class Member extends Model
{
    protected $primaryKey='Member_ID';
    //has
    public function AreaData(){
	return $this->hasOne('App\Models\Area\Area', 'Member_ID');    
    }
    public function StationData(){
        return $this->hasOne('App\Models\Station\Station', 'Member_ID');
    }
    public function SensorValueData(){
        return $this->hasMany('App\Models\Sensor\SensorValue','Member_ID');
    }
    //belongs
    public function PersonData(){

    	return $this->BelongsTo('App\Models\Person\Person', 'Person_ID');
    }
    public function MemberRoleData(){
    	return $this->BelongsTo('App\Models\Member\MemberRole', "MemberRole_ID");
    }
    public function CountryData(){
        return $this->belongsTo('App\Models\Country\Country', 'persons', 'Member_ID', 'Person_ID');
    }

    public function scopeMemberHasSensorValueData($query){
        return $query->has('SensorValueData');
    }
}
