<?php

namespace App\Http\Controllers\userController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function index()
  {

    $nameStation = "Batan";
    $termoDeg = 100;
    $windDir = "NNE";
    $windSpeed = 25;
    $solarRad = 94;
    $gammaDoseRates = 1000;
    $barometer = 1000;
    $percipitation = 0;
    $humidity = 100;


    date_default_timezone_set("Asia/Jakarta");

    return view('user.home', compact('nameStation', 'termoDeg', 'windDir', 'windSpeed', 'solarRad', 'gammaDoseRates', 'barometer',
    'percipitation', 'humidity'));
  }

  public function stationStatus($nameStation)
  {
    return view('user.stationStatus', compact('nameStation'));
  }
}
