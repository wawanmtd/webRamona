<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
      return redirect()->action('adminController\AdminController@index');
    }

    public function logout()
    {
      // $_SESSION('destroy');
      return redirect()->action('userController\HomeController@index');
    }
}
