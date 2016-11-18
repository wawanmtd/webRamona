<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member\Member;
use App\Models\Person\Person;

class KelolaAdminController extends Controller
{
    public function index()
    {
        $ShowMember = Member::all();
        //$ShowPerson = Person::all();
      return view('admin.kelolaAdmin', compact('ShowMember'));
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
