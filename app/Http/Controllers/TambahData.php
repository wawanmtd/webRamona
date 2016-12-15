<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sensor\SensorValue;

class TambahData extends Controller
{
    public function Tambah(){

    	// $sv = SensorValue::create(['Sensor_ID' => 1, 'QuantityValue_ID' => 1, 'Member_ID'=>1 , 'SValue'=>11.11, 'Timestamp'=>'2016-01-01 00:00:10']);
    	// $sv = SensorValue::create(['Sensor_ID' => 1, 'QuantityValue_ID' => 1, 'Member_ID'=>1 , 'SValue'=>11.11, 'Timestamp'=>'2015-01-01 00:00:10']);

    	

	return "Success";
    }
}
