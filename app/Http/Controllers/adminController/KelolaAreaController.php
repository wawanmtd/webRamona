<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Area\Area;

class KelolaAreaController extends Controller
{
    public function index()
    {
        $ShowArea = Area::all();
        //return $ShowArea;
        return view("admin.kelolaArea", compact('ShowArea'));
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

       // return view("admin.kelolaArea");
        return redirect()->action('adminController\KelolaAreaController@index');

    }

    public function ubah()
    {

    }

    public function hapus()
    {

    }
}
