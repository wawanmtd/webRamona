<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member\Member;

class LoginController extends Controller
{
    public function index(Request $request)
    {
      //biar gampang loginya ntar dulu ya

    	// $SelectMember = Member::where('Username', $request->Username)
    	// 						->where('AccessCode', $request->AccessCode)
    	// 						->get();

    	// //return $SelectMember;
     //  return redirect()->action('adminController\AdminController@index',compact('SelectMember'));

      return redirect()->action('adminController\AdminController@index');
    }

    public function logout()
    {
      // $_SESSION('destroy');
      return redirect()->action('userController\HomeController@index');
    }

}
