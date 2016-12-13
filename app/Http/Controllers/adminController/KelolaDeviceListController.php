<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Device\Device;
use App\Models\Device\DeviceList;
use App\Models\Device\DeviceInStation;
use App\Models\Station\Station;
use App\Models\Device\DeviceStatus;
use App\Models\Types\PictureType;
use App\Models\Types\DocumentType;
use Session;

class KelolaDeviceListController extends Controller
{
    public function index()
    {
        $DeviceListShow = DeviceList::all();
        $device = Device::all();
        $station = Station::all();
        $devicestatus = DeviceStatus::all();
        $picturetype = PictureType::all();
        $documenttype = DocumentType::all();
      return view("admin.kelolaDeviceList", compact('DeviceListShow','device','station','devicestatus','picturetype','documenttype'));
    }

    public function tambah(Request $request)
    {
        $dl = new DeviceList;
        $dl->Device_ID = $request->Device_ID;
        $dl->SerialNumber = $request->SerialNumber;
        $dl->ManufactureDate = $request->ManufactureDate;
        $dl->PurchaseDate = $request->PurchaseDate;
        $dl->Supplier_ID = $request->Supplier_ID;
        $dl->DeviceStatus_ID = $request->DeviceStatus_ID;
        $dl->Sales_ID = $request->Sales_ID;
        $dl->Support_ID = $request->Support_ID;
        $dl->Pic_ID = $request->Pic_ID;
        $dl->Remark = $request->Remark;
        $dl->PictureType_ID = $request->PictureType_ID;
        $dl->DocumentType_ID = $request->DocumentType_ID;
        $dl->DeviceListPicture = $request->DeviceListPicture;
        $dl->DeviceListDocument = $request->DeviceListDocument;
        //untuk nyari member_ID nya
        $station = Station::find($request->Station_ID);
        $dl->Member_ID = $station->Member_ID;
        $dl->save();

        //device in station
        $dis = new DeviceInStation;
        $dis->Station_ID = $request->Station_ID;
        $dis->DeviceList_ID = $dl->DeviceList_ID;
        $dis->Altitude = $request->Altitude;
        $dis->Member_ID = $station->Member_ID;
        $dis->save();

         Session::flash('Success', 'Your data successfully recorded');

        return redirect()->action('adminController\KelolaDeviceListController@index');

    }

    public function ubah(Request $request, $id)
    {
        $dl = DeviceList::find($id);
        $dl->Device_ID = $request->Device_ID;
        $dl->SerialNumber = $request->SerialNumber;
        $dl->ManufactureDate = $request->ManufactureDate;
        $dl->PurchaseDate = $request->PurchaseDate;
        $dl->Supplier_ID = $request->Supplier_ID;
        $dl->DeviceStatus_ID = $request->DeviceStatus_ID;
        $dl->Sales_ID = $request->Sales_ID;
        $dl->Support_ID = $request->Support_ID;
        $dl->Pic_ID = $request->Pic_ID;
        $dl->Remark = $request->Remark;
        $dl->Member_ID = $request->Member_ID;
        $dl->PictureType_ID = $request->PictureType_ID;
        $dl->DocumentType_ID = $request->DocumentType_ID;
        $dl->DeviceListPicture = $request->DeviceListPicture;
        $dl->DeviceListDocument = $request->DeviceListDocument;
        $dl->save();

        //device in station
        $dis = DeviceInStation::where('DeviceList_ID', $id)->first();
        $dis->Station_ID = $request->Station_ID;
        $dis->DeviceList_ID = $id;
        $dis->Altitude = $request->Altitude;
        $dis->Member_ID = $request->Member_ID;
        $dis->save();

        Session::flash('Success', 'Your data successfully recorded');

        return redirect()->action('adminController\KelolaDeviceListController@index');
    }

    public function hapus($id)
    {
        $dl = DeviceList::find($id);
        $dis = DeviceInStation::where('DeviceList_ID', $id);
        $dis->delete();
        $dl->delete();

        Session::flash('Success', 'Your data successfully recorded');

        return redirect()->action('adminController\KelolaDeviceListController@index');
    }

    public function editmodal_data($id){
        $devicelistedit = DeviceList::find($id);
        $device = Device::all();
        $station = Station::all();
        $devicestatus = DeviceStatus::all();
        $picturetype = PictureType::all();
        $documenttype = DocumentType::all();
        return view('modals/DeviceList_EditModal',compact('device','station','devicestatus','picturetype','documenttype'))->with('devicelistedit',$devicelistedit);
    }

    public function hapusmodal_data($id){
        $devicelisthapus = DeviceList::find($id);
        return view('modals/DeviceList_HapusModal')->with('devicelisthapus',$devicelisthapus);
    }
}
