<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelolaAdminController extends Controller
{
    public function index()
    {
      return view("admin.kelolaAdmin");
    }

    public function tambah()
    {

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
