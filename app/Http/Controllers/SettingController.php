<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\setting;

class SettingController extends Controller
{
    //

    public function index(){
      return view('admin.setting.index');
    }

}
