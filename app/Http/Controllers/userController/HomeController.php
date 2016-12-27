<?php

namespace App\Http\Controllers\userController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Station\Station;
use App\Models\Member\Member;
use App\Models\Sensor\SensorValue;

use Session;

class HomeController extends Controller
{
  public function index()
  {
    // $IfStationContainData = Station::all();
    // $IfStationContainData->MemberData->SensorValueData();
    // $IfStationContainData->where('SValue','<>','');
    // $Station = Station::all();

    // $stations = Station::whereHas('MemberData', function ($members) {
    // $members->has('SensorValueData')->get();
    // // $members = Member::where('Member_ID',6)->get();
    // })->get();


    // $members = Member::has('SensorValueData')->get();
    // foreach ($members as $member) {
    //   $stations = Station::where('Member_ID',$member->Member_ID)->get();
    // }


    $members = Member::has('SensorValueData')->get();

    // foreach ($members as $member) {
    //   $arr=[];
    //   $gammaDoseRates = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID',$member->Member_ID)->orderBy('SensorValue_ID', 'desc')->first();
    //   $arr.push($gammaDoseRates);
    // }
    
    // $StationData = Station::where('Member_ID',$id)->first();
    // $gammaDoseRates = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID',$members->id)->orderBy('SensorValue_ID', 'desc')->first();

    $nameStation = "Perumahan Puspiptek";
    $termoDeg = 100;
    $windDir = "NNE";
    $windSpeed = 25;
    $solarRad = 94;
    $gammaDoseRates = 1500;
    $barometer = 1000;
    $percipitation = 0;
    $humidity = 100;


    date_default_timezone_set("Asia/Jakarta");

    return view('user.home', compact('nameStation', 'termoDeg', 'windDir', 'windSpeed', 'solarRad', 'gammaDoseRates', 'barometer',
    'percipitation', 'humidity','members'));
  }


  public function gamma($id){
    $gammaDoseRates = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
    return response()->json($gammaDoseRates);
  }

  public function stationStatus($id, Request $request)
  { 

    $termoDeg="";
    $solarRad="";
    $windDir="";
    $barometer="";
    $percipitation="";
    $humidity="";
    
    if(!$request->sensor){
      $gammaDoseRates = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->get();
    }
    else{
    $array = $request->sensor;
      foreach ($array as $arr) {
        switch ($arr) {
          case 1:
            $gammaDoseRates = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->get();
            break;
          case 2:
            $windDir = SensorValue::where('QuantityValue_ID', 2)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->get();
            $windSpeed = SensorValue::where('QuantityValue_ID', 3)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->get();
            break;
          case 4:
            $solarRad = SensorValue::where('QuantityValue_ID', 4)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->get();
            break;
          case 5:
            $barometer = SensorValue::where('QuantityValue_ID', 5)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->get();
            break;
          case 6:
            $termoDeg = SensorValue::where('QuantityValue_ID', 6)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->get();
            break;
          case 7:
            $percipitation = SensorValue::where('QuantityValue_ID', 7)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->get();
            break;
          case 8:
            $humidity = SensorValue::where('QuantityValue_ID', 8)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
            break;
          default:
            $gammaDoseRates = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->get();
            break;
        }
      }
    }    
    $stations = Station::where('Member_ID',$id)->first();
    //$sensors = $request->sensor;
    return view('user.stationStatus',compact('stations','windDir', 'termoDeg' , 'windSpeed', 'solarRad', 'barometer',
    'percipitation', 'humidity','members','gammaDoseRates'));
  }
  // public function stationStatus(Request $request, $nameStation)
  // {
  //   $sensors = $request->sensor;

  //   $gammaDoseRates = in_array("gammaDoseRates", $sensors);
  //   $termoDeg = in_array("termoDeg", $sensors);
  //   $wind = in_array("wind", $sensors);
  //   $solarRad = in_array("solarRad", $sensors);
  //   $barometer = in_array("barometer", $sensors);
  //   $percipitation = in_array("percipitation", $sensors);
  //   $humidity = in_array("humidity", $sensors);

  //   return view('user.stationStatus', compact('nameStation', 'gammaDoseRates', 'termoDeg', 'wind', 'solarRad', 'barometer', 
  //   'percipitation', 'humidity'));
  // }
    
}
