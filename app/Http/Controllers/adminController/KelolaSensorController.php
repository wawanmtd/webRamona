<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sensor\Sensor;
use App\Models\Device\DeviceSensor;
use Session;

class KelolaSensorController extends Controller
{
    public function index()
    {
        $SensorShow = Sensor::all();
      return view("admin.kelolaSensor", compact('SensorShow'));

    }

    public function tambah(Request $request)
    {
        //sensor
        $sensornew = new Sensor;
        $sensornew->SensorType_ID = $request->SensorType_ID;
        $sensornew->FieldName = $request->FieldName;
        $sensornew->ValueCount = 0;
        $sensornew->Description = $request->Description;
        $sensornew->Member_ID = $request->Member_ID;
        $sensornew->MarkerType_ID = $request->MarkerType_ID;
        $sensornew->DocumentType_ID = $request->DocumentType_ID;
        $sensornew->SensorMarker = $request->SensorMarker;
        $sensornew->SensorDocument = $request->SensorDocument;
        $sensornew->Member_ID = $request->Member_ID;
        $sensornew->save();
        
        //devicesensor
        $devicesensornew = new DeviceSensor;
        $devicesensornew->Device_ID = $request->Device_ID;
        $devicesensornew->Sensor_ID = $sensornew->Sensor_ID;
        $devicesensornew->Member_ID = $request->Member_ID;
        $devicesensornew->save();

        Session::flash('Success', 'Your data successfully recorded');

        return redirect()->action('adminController\KelolaSensorController@index');

    }

    public function ubah()
    {

    }

    public function hapus()
    {

    }
}
