<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Station\Station;
use App\Models\Station\StationArea;
use App\Models\Area\Area;
use App\Models\Station\StationType;
use App\Models\Country\Country;
use App\Models\Member\Member;
use App\Models\Types\MarkerType;
use App\Models\Types\DocumentType;
use App\Models\Device\DeviceList;
use App\Models\Sensor\SensorValue;
use Session;

class KelolaStationController extends Controller
{
    public function index()
    {
        $ShowStation = Station::all();
        $area = Area::all();
        $stationtype = StationType::all();
        $country = Country::all();
        $member = Member::where('MemberRole_ID', 2)->get();
        $markertype = MarkerType::all();
        $documenttype = DocumentType::all();
      return view("admin.kelolaStation", compact('ShowStation','area','stationtype','country','member','markertype','documenttype'));
    }

    public function tambah(Request $request)
    {
        $stationnew = new Station;
        $stationnew->StationType_ID = $request->StationType_ID;
        $stationnew->Location = $request->Location;
        $stationnew->StationName = $request->StationName;
        $stationnew->Description = $request->Description;
        $stationnew->Address = $request->Address;
        $stationnew->City = $request->City;
        $stationnew->Country_ID = $request->Country_ID;
        $stationnew->PowerSource = $request->PowerSource;
        $stationnew->Pic_ID = 0;
        $stationnew->InstallationDate = $request->InstallationDate;
        $stationnew->Member_ID = $request->Member_ID;
        $stationnew->MarkerType_ID = $request->MarkerType_ID;
        $stationnew->DocumentType_ID = $request->DocumentType_ID;
        $stationnew->StationMarker = $request->StationMarker;
        $stationnew->StationDocument = $request->StationDocument;
        $stationnew->save();

        //harusnya ga manggil stationarea langsung sih
        $stationareanew = new StationArea;
        $stationareanew->Station_ID = $stationnew->Station_ID;
        $stationareanew->Area_ID = $request->Area_ID;
        $stationareanew->Member_ID = $request->Member_ID;
        $stationareanew->save();

       // return view("admin.kelolaStation");

        Session::flash('Success', 'Your data successfully recorded');

        return redirect()->action('adminController\KelolaStationController@index');
    }

    public function ubah(Request $request, $id)
    {
        $stationnew = Station::find($id);

        //untuk ganti yang di devicelist
        $dl = DeviceList::where('Member_ID', $stationnew->Member_ID)->get();
        foreach($dl as $dls){
            $dls->Member_ID = $request->Member_ID;
        }
        $dls->save();
        ////////////////////////////////

        $stationnew->StationType_ID = $request->StationType_ID;
        $stationnew->Location = $request->Location;
        $stationnew->StationName = $request->StationName;
        $stationnew->Description = $request->Description;
        $stationnew->Address = $request->Address;
        $stationnew->City = $request->City;
        $stationnew->Country_ID = $request->Country_ID;
        $stationnew->PowerSource = $request->PowerSource;
        $stationnew->Pic_ID = 0;
        $stationnew->InstallationDate = $request->InstallationDate;
        $stationnew->Member_ID = $request->Member_ID;
        $stationnew->MarkerType_ID = $request->MarkerType_ID;
        $stationnew->DocumentType_ID = $request->DocumentType_ID;
        $stationnew->StationMarker = $request->StationMarker;
        $stationnew->StationDocument = $request->StationDocument;
        $stationnew->save();

        //harusnya ga manggil stationarea langsung sih
        $stationareanew = StationArea::where('Station_ID', $id)->first();
        $stationareanew->Station_ID = $stationnew->Station_ID;
        $stationareanew->Area_ID = $request->Area_ID;
        $stationareanew->Member_ID = $request->Member_ID;
        $stationareanew->save();

       // return view("admin.kelolaStation");
        Session::flash('Success', 'Your data successfully recorded');

        return redirect()->action('adminController\KelolaStationController@index');
    }

    public function hapus($id)
    {
        $station = Station::find($id);
        $sa = $station->StationAreaData;

        $deviceinstation = $station->DeviceInStationData;
        foreach ($deviceinstation as $dis) {
            $dis->delete();
            $DeviceListData = DeviceList::find($dis->DeviceList_ID);
            $DeviceListData->delete();
        }
    
        $sa->delete();
        $station->delete();

        Session::flash('Success', 'Your data successfully recorded');
        return redirect()->action('adminController\KelolaStationController@index');
    }

    public function editmodal_data($id){
        $stationedit = Station::find($id);
        $area = Area::all();
        $stationtype = StationType::all();
        $country = Country::all();
        $member = Member::where('MemberRole_ID', 2)->get();
        $markertype = MarkerType::all();
        $documenttype = DocumentType::all();
        return view('modals/Station_EditModal',compact('area','stationtype','country','member','markertype','documenttype'))->with('stationedit',$stationedit);
    }

    public function hapusmodal_data($id){
        $stationhapus = Station::find($id);
        return view('modals/Station_HapusModal')->with('stationhapus',$stationhapus);
    }

    public function maxvalue($role, $id){   
        if($role == 1){
            $gammaDoseRatesMax = SensorValue::where('QuantityValue_ID', 1)->orderby('SValue','desc')->first();
            $termoDegMax = SensorValue::where('QuantityValue_ID', 6)->orderBy('SValue', 'desc')->first();
            $windSpeedMax = SensorValue::where('QuantityValue_ID', 3)->orderBy('SValue', 'desc')->first();
            $solarRadMax = SensorValue::where('QuantityValue_ID', 4)->orderBy('SValue', 'desc')->first();
            $barometerMax = SensorValue::where('QuantityValue_ID', 5)->orderBy('SValue', 'desc')->first();
            $percipitationMax = SensorValue::where('QuantityValue_ID', 7)->orderBy('SValue', 'desc')->first();
            $humidityMax = SensorValue::where('QuantityValue_ID', 8)->orderBy('SValue', 'desc')->first();
        }
        else if ($role == 2) {
            $gammaDoseRatesMax = SensorValue::where('QuantityValue_ID', 1)->where('Member_ID',$id)->orderby('SValue','desc')->first();
            $termoDegMax = SensorValue::where('QuantityValue_ID', 6)->where('Member_ID',$id)->orderBy('SValue', 'desc')->first();
            $windSpeedMax = SensorValue::where('QuantityValue_ID', 3)->where('Member_ID',$id)->orderBy('SValue', 'desc')->first();
            $solarRadMax = SensorValue::where('QuantityValue_ID', 4)->where('Member_ID',$id)->orderBy('SValue', 'desc')->first();
            $barometerMax = SensorValue::where('QuantityValue_ID', 5)->where('Member_ID',$id)->orderBy('SValue', 'desc')->first();
            $percipitationMax = SensorValue::where('QuantityValue_ID', 7)->where('Member_ID',$id)->orderBy('SValue', 'desc')->first();
            $humidityMax = SensorValue::where('QuantityValue_ID', 8)->where('Member_ID',$id)->orderBy('SValue', 'desc')->first();
        }

        return view('admin/maxvalue',compact('gammaDoseRatesMax','termoDegMax','windSpeedMax','solarRadMax','barometerMax','percipitationMax','humidityMax'));
    }
}
