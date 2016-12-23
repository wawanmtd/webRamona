<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member\Member;
use App\Models\Person\Person;
use App\Models\Person\PersonContact;
use App\Models\Country\Country;
use App\Models\Blob\BlobType;
use App\Models\Contact\ContactType;
use App\Models\Member\MemberRole;
use Session;
class KelolaAdminController extends Controller
{
    public function index()
    {
        $ShowMember = Member::all()->where('MemberRole_ID', '>',1);
        $country = Country::all();
        $blob = BlobType::all();
        $contact = ContactType::all();
        $memberrole = MemberRole::all();
        return view('admin.kelolaAdmin', compact('ShowMember','country','blob','contact','memberrole'));
        
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

    public function ubah(Request $request, $id)
    {
        $personnew = Person::find($id);
        $personnew->PersonName = $request->PersonName;
        $personnew->Nickname = $request->Nickname;
        $personnew->Address = $request->Address;
        $personnew->City = $request->City;
        $personnew->Country_ID = $request->Country_ID;
        $personnew->BlobType_ID = $request->BlobType_ID;
        $personnew->PersonPicture = $request->PersonPicture;
        $personnew->save();

        $pc = PersonContact::where('Person_ID', $id)->first();
        // return $pc->Person_ID;
        // $pc = PersonContact::find($pc->Person_ID);
        $pc->ContactType_ID = $request->ContactType_ID;
        $pc->ContactValue = $request->ContactValue;
        $pc->save();

        $membernew = Member::where('Person_ID', $id)->first();
        $membernew = Member::find($membernew->Member_ID);
        $membernew->Username = $request->Username;
        $membernew->AccessCode = $request->AccessCode;
        $membernew->MemberRole_ID = $request->MemberRole_ID;
        $membernew->Remark = $request->Remark;
        $membernew->IsActive = 0;
        $membernew->save();

        Session::flash('Success', 'Your data successfully recorded');

       // return view("admin.kelolaArea");
        return redirect()->action('adminController\KelolaAdminController@index');
    }

    public function hapus($id)
    {

        // $member = Member::find($id);          
        // $personcontact = $member->PersonData->PersonContactData;
        // $person = $member->PersonData;
        
        // $member->delete();
        // $personcontact->delete();
        // $person->delete();

        //biar ga ke hapus membernya

        $personnew = Person::find($id);
        $personnew->PersonName = "null";
        $personnew->Nickname = "null";
        $personnew->Address = "null";
        $personnew->City = "null";
        $personnew->Country_ID = $request->Country_ID;
        $personnew->BlobType_ID = $request->BlobType_ID;
        $personnew->save();

        $pc = PersonContact::where('Person_ID', $id)->first();
        // return $pc->Person_ID;
        // $pc = PersonContact::find($pc->Person_ID);
        $pc->ContactType_ID = $request->ContactType_ID;
        $pc->ContactValue = "null";
        $pc->save();

        $membernew = Member::where('Person_ID', $id)->first();
        $membernew = Member::find($membernew->Member_ID);
        $membernew->Username = "null";
        $membernew->AccessCode = "null";
        $membernew->MemberRole_ID = $request->MemberRole_ID;
        $membernew->Remark = $request->Remark;
        $membernew->IsActive = 0;
        $membernew->save();

        Session::flash('Success', 'Your data successfully Deleted');
        return redirect()->action('adminController\KelolaAdminController@index');

      //  return "data terhapus";
       return redirect()->action('adminController\KelolaAdminController@index');
    }

    public function editmodal_data($id){
        $admineditmodal = Member::find($id);
        $country = Country::all();
        $blob = BlobType::all();
        $contact = ContactType::all();
        $memberrole = MemberRole::all();
        return view('modals/Admin_EditModal',compact('country','blob','contact','memberrole'))->with('admineditmodal', $admineditmodal);
    }

    public function hapusmodal_data($id){
        $adminhapus = Member::find($id);
        return view('modals/Admin_HapusModal')->with('adminhapus', $adminhapus);
    }
}
