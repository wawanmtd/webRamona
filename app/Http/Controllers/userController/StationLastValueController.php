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
    $StationData = Station::StationWhereMemberId($id)->first();
    //$StationData = Station::where('Member_ID',$id)->first();
    // $gammaDoseRates = 1500;
    $gammaDoseRates = SensorValue::GammaValue($id)->orderById()->first();
    //$termoDeg = 100;
    $termoDeg = SensorValue::TermoDegValue($id)->OrderById()->first();	
    //$windDir = "NNE";
    $windDir = SensorValue::WindDirValue($id)->OrderById()->first();
    if($windDir){
		$num = $windDir->SValue;
        $windDir = SensorValue::DegToCompass($num);
	}	
    //$windSpeed = 25;
    $windSpeed = SensorValue::WindSpeedValue($id)->OrderById()->first();
    //$solarRad = 94;
    $solarRad = SensorValue::SolarRadValue($id)->OrderById()->first();
    //$barometer = 1000;
    $barometer = SensorValue::BarometerValue($id)->OrderById()->first();
    //$percipitation = 0;
    $percipitation = SensorValue::PercipitationValue($id)->OrderById()->first();
    //$humidity = 100;
    $humidity = SensorValue::HumidityValue($id)->OrderById()->first();

    date_default_timezone_set("Asia/Jakarta");

    return view('user.StationLastValue', compact('nameStation', 'termoDeg', 'windDir', 'windSpeed', 'solarRad', 'gammaDoseRates', 'barometer',
    'percipitation', 'humidity', 'StationData','asd','asdasdasdasd'));
    }    
}
