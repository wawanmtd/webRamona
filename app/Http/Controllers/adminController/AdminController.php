<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
      return view("admin.dashboard");
    }

    public function kelolaAdmin()
    {
      return view("admin.kelolaAdmin");
    }

    public function kelolaArea()
    {
      return view("admin.kelolaArea");
    }

    public function kelolaStation()
    {
      return view("admin.kelolaStation");
    }

    public function kelolaSensor()
    {
      return view("admin.kelolaSensor");
    }

    public function kelolaBerita()
    {
      return view("admin.kelolaBerita");
    }
}
