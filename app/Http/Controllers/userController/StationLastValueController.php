<?php

namespace App\Http\Controllers\userController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member\Member;
use App\Models\Station\Station;
use App\Models\Sensor\SensorValue;


class StationLastValueController extends Controller
{
    public function index($id){

	//$nameStation = "Perumahan Puspiptek";
    $StationData = Station::where('Member_ID',$id)->first();

    // $gammaDoseRates = 1500;
    $gammaDoseRates = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
    //$termoDeg = 100;
    $termoDeg = SensorValue::where('QuantityValue_ID', 6)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();	
    //$windDir = "NNE";
    $windDir = SensorValue::where('QuantityValue_ID', 2)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
 	if($windDir){
	 	function degToCompass($num) 
	 	{ 
		    while( $num < 0 ) $num += 360 ;
		    while( $num >= 360 ) $num -= 360 ; 
		    $val =  round(($num - 11.25 ) / 22.5)  ;
		    $arr=["N","NNE","NE","ENE","E","ESE", "SE", 
		          "SSE","S","SSW","SW","WSW","W","WNW","NW","NNW"] ;
		    return $arr[ ($val) ] ;
		}
		$windDir = degToCompass($windDir->SValue);
	}	
    //$windSpeed = 25;
    $windSpeed = SensorValue::where('QuantityValue_ID', 3)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
    //$solarRad = 94;
    $solarRad = SensorValue::where('QuantityValue_ID', 4)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
    //$barometer = 1000;
    $barometer = SensorValue::where('QuantityValue_ID', 5)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
    //$percipitation = 0;
    $percipitation = SensorValue::where('QuantityValue_ID', 7)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
    //$humidity = 100;
    $humidity = SensorValue::where('QuantityValue_ID', 8)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();

    date_default_timezone_set("Asia/Jakarta");

    return view('user.StationLastValue', compact('nameStation', 'termoDeg', 'windDir', 'windSpeed', 'solarRad', 'gammaDoseRates', 'barometer',
    'percipitation', 'humidity', 'StationData'));


    }
}
