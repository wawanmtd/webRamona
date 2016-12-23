<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News\NewsType;
use App\Models\News\News;
use App\Models\Types\PictureType;
use Session;

class KelolaBeritaController extends Controller
{
    public function index()
    {
        $newss = News::all();
        $newsType = NewsType::all();
        $pictureType = PictureType::all();
        //$ShowMember = Member::all()->where('MemberRole_ID', '>',1);
      return view("admin.kelolaBerita",compact('newss','newsType','pictureType'));
    }

    public function tambah(Request $request)
    {
        $news = New News;
        $news->NewsType_ID = $request->NewsType_ID;
        $news->Member_ID = $request->Member_ID;
        $news->IsUrgent = $request->IsUrgent;
        $news->NewsTitle = $request->NewsTitle;
        $news->NewsContent = $request->NewsContent;
        $news->PictureType_ID = 1;
        $news->NewsPicture = '1';
        $news->save();

        Session::flash('Success', 'Your data successfully recorded');

        return redirect()->action('adminController\KelolaBeritaController@index');
    }

    public function ubah($id, Request $request)
    {
        $news = News::find($id);
        $news->NewsType_ID = $request->NewsType_ID;
        $news->Member_ID = $request->Member_ID;
        $news->IsUrgent = $request->IsUrgent;
        $news->NewsTitle = $request->NewsTitle;
        $news->NewsContent = $request->NewsContent;
        $news->PictureType_ID = 1;
        $news->NewsPicture = '1';
        $news->save();

        Session::flash('Success', 'Your data successfully recorded');

        return redirect()->action('adminController\KelolaBeritaController@index');
    }

    public function hapus()
    {

    }

    public function approve()
    {
      # code...
    }
}
