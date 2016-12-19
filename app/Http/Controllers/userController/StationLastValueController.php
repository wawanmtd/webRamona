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

    $StationData = Station::where('Member_ID',$id)->first();

	//$nameStation = "Perumahan Puspiptek";
    // $gammaDoseRates = 1500;
    $gammaDoseRates = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
    $termoDeg = 100;
    $windDir = "NNE";
    $windSpeed = 25;
    $solarRad = 94;
    $barometer = 1000;
    $percipitation = 0;
    $humidity = 100;


    date_default_timezone_set("Asia/Jakarta");

    return view('user.StationLastValue', compact('nameStation', 'termoDeg', 'windDir', 'windSpeed', 'solarRad', 'gammaDoseRates', 'barometer',
    'percipitation', 'humidity', 'StationData'));


    }
}
