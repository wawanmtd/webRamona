<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sensor\Sensor;
use App\Models\Device\DeviceSensor;
use App\Models\Sensor\SensorType;
use App\Models\Types\MarkerType;
use App\Models\Types\DocumentType;
use App\Models\Device\Device;

use Session;

class KelolaSensorController extends Controller
{
    public function index()
    {
        $SensorShow = Sensor::all();
        $sensortype = SensorType::all();
        $markertype = MarkerType::all();
        $documenttype = DocumentType::all();
        $device = Device::all();
      return view("admin.kelolaSensor", compact('SensorShow','sensortype','markertype','documenttype','device'));

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

    public function ubah(Request $request, $id)
    {
        //sensor
        $sensornew = Sensor::find($id);
        $sensornew->SensorType_ID = $request->SensorType_ID;
        $sensornew->FieldName = $request->FieldName;
        $sensornew->Description = $request->Description;
        $sensornew->Member_ID = $request->Member_ID;
        $sensornew->MarkerType_ID = $request->MarkerType_ID;
        $sensornew->DocumentType_ID = $request->DocumentType_ID;
        // $sensornew->SensorMarker = $request->SensorMarker;
        // $sensornew->SensorDocument = $request->SensorDocument;
        $sensornew->Member_ID = $request->Member_ID;
        $sensornew->save();
        
        //devicesensor
        $devicesensornew =DeviceSensor::where('Sensor_ID', $id)->first();
        //$devicesensornew = DeviceSensor::find($devicesensor->Device);
        $devicesensornew->Device_ID = $request->Device_ID;
        $devicesensornew->Sensor_ID = $sensornew->Sensor_ID;
        $devicesensornew->Member_ID = $request->Member_ID;
        $devicesensornew->save();

        Session::flash('Success', 'Your data successfully recorded');

        return redirect()->action('adminController\KelolaSensorController@index');
    }

    public function hapus($id)
    {
        $sensor = Sensor::find($id);
        $dc = $sensor->DeviceSensorData;
        $dc->delete();
        $sensor->delete();
        
        Session::flash('Success', 'Your data successfully recorded');

        return redirect()->action('adminController\KelolaSensorController@index');
    }

    public function editmodal_data($id){
        $sensoredit = Sensor::find($id);
         $sensortype = SensorType::all();
        $markertype = MarkerType::all();
        $documenttype = DocumentType::all();
        $device = Device::all();
        return view('modals/Sensor_EditModal',compact('sensortype','markertype','documenttype','device'))->with('sensoredit',$sensoredit);
    }

    public function hapusmodal_data($id){
        $sensorhapus = Sensor::find($id);
        return view('modals/Sensor_HapusModal')->with('sensorhapus',$sensorhapus);
    }
}
