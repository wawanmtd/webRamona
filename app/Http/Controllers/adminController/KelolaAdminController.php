<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member\Member;
use App\Models\Person\Person;
use App\Models\Person\PersonContact;
use Session;
class KelolaAdminController extends Controller
{
    public function index()
    {
        $ShowMember = Member::all()->where('MemberRole_ID', 2);
        return view('admin.kelolaAdmin', compact('ShowMember'));
        
    }

    public function tambah(Request $request)
    {
        $personnew = new Person;
        $personnew->PersonName = $request->PersonName;
        $personnew->Nickname = $request->Nickname;
        $personnew->Address = $request->Address;
        $personnew->City = $request->City;
        $personnew->Country_ID = $request->Country_ID;
        $personnew->BlobType_ID = $request->BlobType_ID;
        $personnew->PersonPicture = $request->PersonPicture;
        $personnew->save();

        $pc = new PersonContact;
        $pc->Person_ID = $personnew->Person_ID;
        $pc->ContactType_ID = $request->ContactType_ID;
        $pc->ContactValue = $request->ContactValue;
        $pc->save();

        $membernew = new Member;
        $membernew->Username = $request->Username;
        $membernew->AccessCode = $request->AccessCode;
        $membernew->Person_ID = $personnew->Person_ID;
        $membernew->MemberRole_ID = $request->MemberRole_ID;
        $membernew->Remark = $request->Remark;
        $membernew->IsActive = 0;
        $membernew->save();

        Session::flash('Success', 'Your data successfully recorded');

        return redirect()->action('adminController\KelolaAdminController@index');
        //return view('admin.kelolaAdmin');
    }

    public function ubah()
    {

    }

    public function hapus()
    {
      //  return "data terhapus";
       return redirect()->action('adminController\KelolaAdminController@index');
    }
}
