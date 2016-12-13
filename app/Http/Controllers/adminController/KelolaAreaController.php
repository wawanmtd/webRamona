<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Area\Area;
use App\Models\Station\StationArea;
use App\Models\Station\Station;
use App\Models\Country\Country;
use Session;

class KelolaAreaController extends Controller
{
    public function index()
    {
        $ShowArea = Area::all();
        $country = Country::all();
        //return $ShowArea;
        return view("admin.kelolaArea", compact('ShowArea','country'));
    }

    public function tambah(Request $request)
    {
        $areanew = new Area;
        $areanew->AreaName = $request->AreaName;
        $areanew->Description = $request->Description;
        $areanew->Remark = $request->Remark;
        $areanew->Country_ID = $request->Country_ID;
        $areanew->Member_ID = $request->Member_ID;
        $areanew->save();

        Session::flash('Success', 'Your data successfully recorded');

       // return view("admin.kelolaArea");
        return redirect()->action('adminController\KelolaAreaController@index');

    }

    public function ubah(Request $request, $id)
    {
        $areanew = Area::find($id);
        $areanew->AreaName = $request->AreaName;
        $areanew->Description = $request->Description;
        $areanew->Remark = $request->Remark;
        $areanew->Country_ID = $request->Country_ID;
        $areanew->Member_ID = $request->Member_ID;
        $areanew->save();

        Session::flash('Success', 'Your data successfully recorded');

       // return view("admin.kelolaArea");
        return redirect()->action('adminController\KelolaAreaController@index');
    }

    public function hapus($id)
    {

        $area = Area::find($id);                //mencari dari id area
        $stationarea = $area->StationAreaData;  //mencari data di stationarea

        //untuk mendelete station satu per satu, karena sifatnya "hasmany"
        foreach ($stationarea as $stationareadata) {
            $stationareadata->delete();
            $stationdata = Station::find($stationareadata->Station_ID);
            $stationdata->delete();
        }
        $area->delete();


        Session::flash('Success', 'Your data successfully Deleted');
        return redirect()->action('adminController\KelolaAreaController@index');
    }

    // public function areaeditmodal_data(Request $request){
    public function editmodal_data($id){
        // $id = $request->Area_ID;
        $areaeditmodal = Area::find($id);
        $country = Country::all();
        return view('modals/Area_EditModal',compact('country'))->with('areaeditmodal', $areaeditmodal);
        // return $areaeditmodal;
        // return response()->json($areaeditmodal);
    }

    public function hapusmodal_data($id){
        $areahapus = Area::find($id);
        return view('modals/Area_HapusModal')->with('areahapus', $areahapus);
    }

    public function detail($id){
        $areadetail = Area::find($id);
        return view('modals/Area_Detail')->with('areadetail',$areadetail);
    }
}
