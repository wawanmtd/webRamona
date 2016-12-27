<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sensor\SensorValue;
use App\Models\Member\Member;

class TambahData extends Controller
{
    public function Tambah(){
    $members = Member::has('SensorValueData')->get();
    foreach ($members as $member) {
      $arr=[];
      $gammaDoseRates = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID',$member->Member_ID)->orderBy('SensorValue_ID', 'desc')->first();
      $
      array_push($arr, $gammaDoseRates);
  	}
      return $array;

  //   	$gammaDoseRates = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID',3)->orderBy('SensorValue_ID', 'desc')->take(10)->get();
		// return $gammaDoseRates;

    	// $sv = SensorValue::create(['Sensor_ID' => 1, 'QuantityValue_ID' => 1, 'Member_ID'=>1 , 'SValue'=>11.11, 'Timestamp'=>'2016-01-01 00:00:10']);
    	// $sv = SensorValue::create(['Sensor_ID' => 1, 'QuantityValue_ID' => 1, 'Member_ID'=>1 , 'SValue'=>11.11, 'Timestamp'=>'2015-01-01 00:00:10']);

    	

	return "Success";
    }
}
