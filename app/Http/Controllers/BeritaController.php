<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
      return view('berita');
    }
    public function berita($Headline)
    {
      return view('newsDetail', compact('Headline'));
    }
}
