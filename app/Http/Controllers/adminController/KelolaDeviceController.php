<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Device\Device;
use Session;

class KelolaDeviceController extends Controller
{
    public function index()
    {
        $DeviceShow = Device::all();
      return view("admin.kelolaDevice", compact('DeviceShow'));
    }

    public function tambah(Request $request)
    {
        $devicenew = new Device;
        $devicenew->DeviceModel = $request->DeviceModel;
        $devicenew->Manufacturer_ID = $request->Manufacturer_ID;
        $devicenew->Description = $request->Description;
        $devicenew->SensorCount = $request->SensorCount;
        $devicenew->Country_ID = $request->Country_ID;
        $devicenew->Remark =    $request->Remark;
        $devicenew->VoltageRange = $request->VoltageRange;
        $devicenew->Member_ID = $request->Member_ID;
        $devicenew->DocumentType_ID = $request->DocumentType_ID;
        $devicenew->DeviceDocument = $request->DeviceDocument;
        $devicenew->save();

         Session::flash('Success', 'Your data successfully recorded');

        return redirect()->action('adminController\KelolaDeviceController@index');

    }

    public function ubah()
    {

    }

    public function hapus()
    {

    }
}
