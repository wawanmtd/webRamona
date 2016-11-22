<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	//untuk login
    // public function index($SelectMember)
    // {
    // 	//$Selec as $SelectMember;
    // 	//return $SelectMember;
    //   //return view("admin.dashboard", compact('selectmember'));
    // }

	public function index()
    {
    return  view("admin.dashboard");
	}
}
