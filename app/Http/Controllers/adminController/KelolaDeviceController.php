<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Device\Device;
use App\Models\Country\Country;
use App\Models\Types\DocumentType;
use App\Models\Station\Station;

use Session;

class KelolaDeviceController extends Controller
{
    public function index()
    {
        $DeviceShow = Device::all();
        $country = Country::all();
        $documenttype = DocumentType::all();
      return view("admin.kelolaDevice", compact('DeviceShow','country','documenttype'));
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

    public function ubah(Request $request, $id)
    {
        $device = Device::find($id);
        $device->DeviceModel = $request->DeviceModel;
        $device->Manufacturer_ID = $request->Manufacturer_ID;
        $device->Description = $request->Description;
        $device->SensorCount = $request->SensorCount;
        $device->Country_ID = $request->Country_ID;
        $device->Remark = $request->Remark;
        $device->VoltageRange = $request->VoltageRange;
        $device->Member_ID = $request->Member_ID;
        $device->DocumentType_ID = $request->DocumentType_ID;
        //$device->DeviceDocument = $request->DeviceDocument;
        $device->save();

        Session::flash('Success', 'Your data successfully recorded');

        return redirect()->action('adminController\KelolaDeviceController@index');
    }

    public function hapus($id)
    {
        $device = Device::find($id);
        $device->delete();

        Session::flash('Success', 'Your data successfully recorded');

        return redirect()->action('adminController\KelolaDeviceController@index');
    }

    public function editmodal_data($id){
        $deviceedit = Device::find($id);
        $country = Country::all();
        $documenttype = DocumentType::all();
        return view('modals/Device_EditModal',compact('country','documenttype'))->with('deviceedit',$deviceedit);
    }

    public function hapusmodal_data($id){
        $devicehapus = Device::find($id);
        return view('modals/Device_HapusModal')->with('devicehapus',$devicehapus);
    }
}
