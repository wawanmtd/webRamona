<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index($SelectMember)
    {
    	//$Selec as $SelectMember;
    	return $SelectMember;
      //return view("admin.dashboard", compact('selectmember'));
    }
}
