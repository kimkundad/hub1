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

    public function get_all_post(Request $request){
      return $request->all();
    }


    public function post_gb_pay(Request $request){

      $secret_key = "uyWqinDLz1DBKSk4lOy2ujsdXZI61IBG";
      $gbToken = $request['gbToken'];
      $data = array(
        'amount' => 1.00,
        'referenceNo' => '012345678',
        'detail' => 't-shirt',
        'customerName' => 'John',
        'card' => array(
          'token' => $gbToken,
        ),
        'otp' => 'N',
        "responseUrl" => "http://127.0.0.1:8000/get_all_post",
        "backgroundUrl" => "http://127.0.0.1:8000/get_all_post"
      );

      $payload = json_encode($data);

      $ch = curl_init('https://api.gbprimepay.com/v1/tokens/charge'); // Test env
      curl_setopt($ch, CURLOPT_HEADER, 1);
      curl_setopt($ch, CURLOPT_USERPWD, $secret_key . ':');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($payload))
      );

      $result = curl_exec($ch);

      curl_close($ch);

      echo $result;

    }


}
