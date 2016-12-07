<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Station\Station;
use App\Models\Station\StationArea;
Use Session;

class KelolaStationController extends Controller
{
    public function index()
    {
        $ShowStation = Station::all();
      return view("admin.kelolaStation", compact('ShowStation'));
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
        //soon
        // $deviceinstation = $station->DeviceInStationData;
        $sa->delete();
        $station->delete();

        Session::flash('Success', 'Your data successfully recorded');
        return redirect()->action('adminController\KelolaStationController@index');
    }

    public function editmodal_data($id){
        $stationedit = Station::find($id);
        return view('modals/Station_EditModal')->with('stationedit',$stationedit);
    }

    public function hapusmodal_data($id){
        $stationhapus = Station::find($id);
        return view('modals/Station_HapusModal')->with('stationhapus',$stationhapus);
    }
}
