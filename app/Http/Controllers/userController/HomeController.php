<?php

namespace App\Http\Controllers\userController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Station\Station;
use App\Models\Member\Member;
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

  public function stationStatus($nameStation)
  {
    // view($('#gammaDoseRow'.hidden(false)));
    return view('user.stationStatus', compact('nameStation'));
  }
  public function test()
  {
    return view ('user.home2');
  }
  public function test2(Request $request)
  {
    $data['a'] = $request->a;
    return view('user.test2')->with($data);
    //return redirect()->action('userController\HomeController@test');
  }
  // public function stationStatus(Request $request)
  // {
  //   // $station = $request->$nameStation;
  //   // return redirect()->action('userController\HomeController@stationStatusIndex');
  //   // return $station;
  //   // print_r($request::all());
  //   echo "asdf";
  // }

  public function stationStatusIndex()
  {
    # code...
    return view('user.stationStatus');
  }
}
