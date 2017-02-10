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
    $members = Member::MemberHasSensorValueData()->get();

    //wawan
    foreach ($members as $member) {
      $id = $member->Member_ID;
      $gammaDoseRates[$id] = SensorValue::GammaValue($id)->OrderById()->first();
    }

    date_default_timezone_set("Asia/Jakarta");
    return view ('user.home', compact('gammaDoseRates', 'members'));
  }


  public function gamma($id){
    $gammaDoseRates = SensorValue::GammaValue($id)->orderById()->first();
    // dd($gammaDoseRates);
    // return response()->json($gammaDoseRates);
    return $gammaDoseRates;
  }

  public function stationStatus($id, Request $request)
  {
    $gammaDoseRates="";
    $termoDeg="";
    $solarRad="";
    $windDir="";
    $barometer="";
    $percipitation="";
    $humidity="";
    $array = $request->sensor;
    // dd($array);
    if ($array != null){
      foreach ($array as $arr) {
        switch ($arr) {
          case 2:
          $windDir = SensorValue::WindDirValue($id)->get();
          $windDirLast = SensorValue::WindDirValue($id)->OrderById()->first();
          if($windDirLast){
            $num = $windDirLast->SValue;
            $windDirLast = SensorValue::DegToCompass($num);
          } 
          $windSpeed = SensorValue::WindSpeedValue($id)->get();
          $windSpeedLast = SensorValue::WindSpeedValue($id)->OrderById()->first();
          break;
          case 4:
          $solarRad = SensorValue::SolarRadValue($id)->get();
          $solarRadLast = SensorValue::SolarRadValue($id)->OrderById()->first();
          break;
          case 5:
          $barometer = SensorValue::BarometerValue($id)->get();
          $barometerLast = SensorValue::BarometerValue($id)->OrderById()->first();
          break;
          case 6:
          $termoDeg = SensorValue::TermoDegValue($id)->get();
          $termoDegLast = SensorValue::TermoDegValue($id)->OrderById()->first();
          break;
          case 7:
          $percipitation = SensorValue::PercipitationValue($id)->get();
          $percipitationLast = SensorValue::PercipitationValue($id)->OrderById()->first();
          break;
          case 8:
          $humidity = SensorValue::HumidityValue($id)->get();
          $humidityLast = SensorValue::HumidityValue($id)->OrderById()->first();
          break;
          default:
          $gammaDoseRates = SensorValue::GammaValue($id)->get();
          $gammaDoseRatesLast = SensorValue::GammaValue($id)->OrderById()->first();
          break;
        }
      }
    }
    else{
       $gammaDoseRates = SensorValue::GammaValue($id)->WhereYear()->get();
       $gammaDoseRatesLast = SensorValue::GammaValue($id)->OrderById()->first();
    }
      // $StationData = Station::where('Member_ID',$id)->first();
      $stations = Station::StationWhereMemberId($id)->first();
 
      //$sensors = $request->sensor;
      return view('user.stationStatus',compact('StationData','windDir', 'termoDeg' , 'windSpeed', 'solarRad', 'gammaDoseRates', 'barometer',
      'percipitation', 'humidity','members', 'stations'), compact('gammaDoseRatesLast','windDirLast','windSpeedLast','termoDegLast','solarRadLast','barometerLast','percipitationLast','humidityLast'));

  }

}
