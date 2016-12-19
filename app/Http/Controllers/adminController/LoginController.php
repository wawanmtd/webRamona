<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member\Member;
use App\Models\Activity\ACtivityLog;
use App\Models\Station\Station;
use Session;

class LoginController extends Controller
{
    public function index(Request $request)
    {
      $SelectMember = Member::where('Username', $request->Username)
                 ->where('AccessCode', $request->AccessCode)
                 ->first();
      if($SelectMember){
      $newactivity = new ActivityLog;
      $newactivity->ActivityType_ID = 1;
      $newactivity->Member_ID = $SelectMember->Member_ID;
      $newactivity->ActivityInfo = "Login";
      $newactivity->save();           
      }
      
      $SelectStation = Station::where('Member_ID', $SelectMember->Member_ID)->first();
      // return $SelectStation;

      Session::put('Member_ID', $SelectMember->Member_ID);
      Session::put('PersonName', $SelectMember->PersonData->PersonName);
      Session::put('Role', $SelectMember->MemberRoleData->NameRole);
      Session::put('AccessLevel', $SelectMember->MemberRoleData->AccessLevel);
      if($SelectStation){Session::put('Station', $SelectStation->StationName);}

      return redirect()->action('adminController\AdminController@index',compact('selectMember'));

      return redirect()->action('adminController\AdminController@index');
    }

    public function logout()
    {
      $memberid  = Session::get('Member_ID');
      $newactivity = new ActivityLog;
      $newactivity->ActivityType_ID = 2;
      $newactivity->Member_ID = $memberid;
      $newactivity->ActivityInfo = "Logout";
      $newactivity->save();        
      Session::flush();
      return redirect()->action('userController\HomeController@index');
    }

}
