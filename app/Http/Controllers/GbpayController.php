<?php

namespace App\Http\Controllers;

use App\course;
use App\coupon_user;
use App\Http\Requests;
use Session;
use App\blog;
use Auth;
use App\bank;
use App\teacher;
use App\package_his;
use App\submit_package;
use App\user_payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GbpayController extends Controller
{
    //

    public function gb_pay($id){

      $packag_id = $id;

      $pack = DB::table('package_products')
       ->where('package_status', 1)
       ->where('id', $id)
       ->first();

       $data['objs'] = $pack;

        return view('gb_pay', $data);

    }


}
