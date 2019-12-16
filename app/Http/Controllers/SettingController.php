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

      $objs = setting::find(1);
      $data['objs'] = $objs;
      return view('admin.setting.index',$data);
    }

    public function post_setting(Request $request){

      $package = setting::find(1);
      $package->youyube_index = $request['youyube_index'];
      $package->email = $request['email'];
      $package->phone = $request['phone'];
      $package->address = $request['address'];
      $package->time_open = $request['time_open'];
      $package->line = $request['line'];
      $package->line_url = $request['line_url'];
      $package->facebook = $request['facebook'];
      $package->ig = $request['ig'];
      $package->title_website = $request['title_website'];
      $package->google_analytics = $request['google_analytics'];
      $package->save();


      return redirect(url('admin/setting/'))->with('edit_success','แก้ไขบทความสำเร็จแล้วค่ะ');

    }

}
