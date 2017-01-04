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
    $members = Member::has('SensorValueData')->get();

    foreach ($members as $member) {
      $gammaDoseRates[$member->Member_ID] = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID',$member->Member_ID)->orderBy('SensorValue_ID', 'desc')->first();
    }

    date_default_timezone_set("Asia/Jakarta");

    return view ('user.home', compact('gammaDoseRates', 'members'));
  }


  public function gamma($id){
    $gammaDoseRates = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
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
          $windDir = SensorValue::where('QuantityValue_ID', 2)->where('Member_ID',$id)->get();
          $windDirLast = SensorValue::where('QuantityValue_ID', 2)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
          if($windDirLast){
            function degToCompass($num) 
            { 
                while( $num < 0 ) $num += 360 ;
                while( $num >= 360 ) $num -= 360 ; 
                $val =  round(($num - 11.25 ) / 22.5)  ;
                $arr=["N","NNE","NE","ENE","E","ESE", "SE", 
                      "SSE","S","SSW","SW","WSW","W","WNW","NW","NNW"] ;
                return $arr[ ($val) ] ;
            }
            $windDirLast = degToCompass($windDirLast->SValue);
          } 
          $windSpeed = SensorValue::where('QuantityValue_ID', 3)->where('Member_ID',$id)->get();
          $windSpeedLast = SensorValue::where('QuantityValue_ID', 3)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
          break;
          case 4:
          $solarRad = SensorValue::where('QuantityValue_ID', 4)->where('Member_ID',$id)->get();
          $solarRadLast = SensorValue::where('QuantityValue_ID', 4)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
          break;
          case 5:
          $barometer = SensorValue::where('QuantityValue_ID', 5)->where('Member_ID',$id)->get();
          $barometerLast = SensorValue::where('QuantityValue_ID', 5)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
          break;
          case 6:
          $termoDeg = SensorValue::where('QuantityValue_ID', 6)->where('Member_ID',$id)->get();
          $termoDegLast = SensorValue::where('QuantityValue_ID', 6)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
          break;
          case 7:
          $percipitation = SensorValue::where('QuantityValue_ID', 7)->where('Member_ID',$id)->get();
          $percipitationLast = SensorValue::where('QuantityValue_ID', 7)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
          break;
          case 8:
          $humidity = SensorValue::where('QuantityValue_ID', 8)->where('Member_ID',$id)->get();
          $humidityLast = SensorValue::where('QuantityValue_ID', 8)->where('Member_ID',$id)->orderBy('SensorValue_ID', 'desc')->first();
          break;
          default:
          $gammaDoseRates = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID',$id)->get();
          $gammaDoseRatesLast = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID', $id)->orderBy('SensorValue_ID', 'desc')->first();
          break;
        }
      }
    }
    else{
       $gammaDoseRates = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID',$id)->get();
       $gammaDoseRatesLast = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID', $id)->orderBy('SensorValue_ID', 'desc')->first();
    }
      // $StationData = Station::where('Member_ID',$id)->first();
      $stations = Station::where('Member_ID',$id)->first();
 
      //$sensors = $request->sensor;
      return view('user.stationStatus',compact('StationData','windDir', 'termoDeg' , 'windSpeed', 'solarRad', 'gammaDoseRates', 'barometer',
      'percipitation', 'humidity','members', 'stations'), compact('gammaDoseRatesLast','windDirLast','windSpeedLast','termoDegLast','solarRadLast','barometerLast','percipitationLast','humidityLast'));
// =======
//   public function stationStatus(Request $request, $nameStation)
//   {
//     $sensors = $request->sensor;

//     $gammaDoseRates = in_array("gammaDoseRates", $sensors);
//     $termoDeg = in_array("termoDeg", $sensors);
//     $wind = in_array("wind", $sensors);
//     $solarRad = in_array("solarRad", $sensors);
//     $barometer = in_array("barometer", $sensors);
//     $percipitation = in_array("percipitation", $sensors);
//     $humidity = in_array("humidity", $sensors);

//     return view('user.stationStatus', compact('nameStation', 'gammaDoseRates', 'termoDeg', 'wind', 'solarRad', 'barometer',
//     'percipitation', 'humidity'));
// >>>>>>> origin/master
  }

}
