<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackupRestoreController extends Controller
{
    public function backupView()
    {
      return view("admin.backup");
    }

    public function backupData()
    {
      # code...
    }

    public function restoreView()
    {
      return view("admin.restore");
    }

    public function restoreData()
    {
      # code...
    }
}
