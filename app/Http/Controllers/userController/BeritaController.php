<?php

namespace App\Http\Controllers\userController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
  public function index()
  {
    $headline = "Menciptakan Generasi yang Menjadi Indah Pada Waktunya";
    $headlines = str_replace(" ", "-", $headline);
    $headlines = strtolower($headlines);
    return view('user.berita', compact('headline', 'headlines'));
  }
  public function berita($headline)
  {
    return view('user.newsDetail', compact('headline'));
  }
}
