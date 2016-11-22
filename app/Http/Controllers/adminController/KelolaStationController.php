<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Station\Station;

class KelolaStationController extends Controller
{
    public function index()
    {
      return view("admin.kelolaStation");
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

        return view("admin.kelolaStation");
    }

    public function ubah()
    {

    }

    public function hapus()
    {

    }
}
