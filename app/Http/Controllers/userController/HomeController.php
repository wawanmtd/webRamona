<?php

namespace App\Http\Controllers\userController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function index()
  {

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
    'percipitation', 'humidity'));
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
