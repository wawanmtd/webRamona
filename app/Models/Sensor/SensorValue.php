<?php

namespace App\Models\Sensor;

use Illuminate\Database\Eloquent\Model;

class SensorValue extends Model
{
    protected $primaryKey='SensorValue_ID';
    public $timestamps = false;

    protected $fillable=['Sensor_ID', 'QuantityValue_ID', 'Member_ID' , 'SValue', 'Timestamp'];

    public function MemberData(){
		return $this->belongsTo('App\Models\Member\Member', 'Member_ID');
	}
	//scope
	public function scopeOrderById($query){
		return $query->orderBy('SensorValue_ID', 'desc');
	}
	public function scopeWhereYear($query){
		return $query->whereDate('Timestamp', '>', '2017-01-01 00:00:00');
		return $query->where('Timestamp', '>=', date('Y-m-d').' 00:00:00');
		return $query->whereYear('Timestamp', '>=', '2016');
	}
	public function scopeGammaValue($query, $id){
		return $query->where('QuantityValue_ID', 1)->where('Member_ID',$id);
	}
	public function scopeGammaValueHomeController($query, $id){
		return $query->where('QuantityValue_ID', 1)->where('Member_ID',$member->Member_ID);
	}
	public function scopeWindDirValue($query, $id){
		return $query->where('QuantityValue_ID', 2)->where('Member_ID',$id);
	}
	public function scopeWindSpeedValue($query, $id){
		return $query->where('QuantityValue_ID', 3)->where('Member_ID',$id);
	}
	public function scopeSolarRadValue($query, $id){
		return $query->where('QuantityValue_ID', 4)->where('Member_ID',$id);
	}
	public function scopeBarometerValue($query, $id){
		return $query->where('QuantityValue_ID', 5)->where('Member_ID',$id);
	}
	public function scopeTermoDegValue($query, $id){
		return $query->where('QuantityValue_ID', 6)->where('Member_ID',$id);
	}
	public function scopePercipitationValue($query, $id){
		return $query->where('QuantityValue_ID', 7)->where('Member_ID',$id);
	}
	public function scopeHumidityValue($query, $id){
		return $query->where('QuantityValue_ID', 8)->where('Member_ID',$id);
	}

	public function scopeDegToCompass($query, $num){
		while( $num < 0 ) $num += 360 ;
                while( $num >= 360 ) $num -= 360 ; 
                $val =  round(($num - 11.25 ) / 22.5)  ;
                $arr=["N","NNE","NE","ENE","E","ESE", "SE", 
                      "SSE","S","SSW","SW","WSW","W","WNW","NW","NNW"] ;
                return $arr[($val)];
	}
}
