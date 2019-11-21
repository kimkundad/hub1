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

class PagkageControlle extends Controller
{
    //

    public function package(){

      $get_data = DB::table('package_products')
            ->where('package_status', 1)
            ->orderby('package_sort', 'asc')
            ->get();

            $data['objs'] = $get_data;

      return view('package', $data);

    }


    public function submit_info_package($id){

      $packag_id = $id;

      $pack = DB::table('package_products')
       ->where('package_status', 1)
       ->where('id', $id)
       ->first();


        if($pack->package_type == 0){
          return redirect(url('get_info_package/'.$packag_id))->with('hbd','กรอกวันเกิดนักเรียนด้วยนะจ๊ะ');
        }else{
          return redirect(url('get_free_package/'.$packag_id))->with('hbd','กรอกวันเกิดนักเรียนด้วยนะจ๊ะ');
        }

    }


    public function get_info_package($id){

      $packag_id = $id;

      $pack = DB::table('package_products')
       ->where('package_status', 1)
       ->where('id', $id)
       ->first();

       $set_num_date = (\random_int(1000, 9999));

       $data['rand'] = $set_num_date;

       $data['objs'] = $pack;


      return view('get_info_package', $data);

    }


    public function get_free_package($id){

      $pack = DB::table('package_products')
       ->where('package_status', 1)
       ->where('id', $id)
       ->first();

       if(isset($pack)){
        $check = DB::table('package_his')
         ->where('user_id', Auth::user()->id)
         ->where('packeage_id', $id)
         ->count();
      }else{
        return abort(404);
      }

      $pack_check = DB::table('package_products')
        ->where('package_status', 1)
        ->where('package_type', 1)
        ->where('id', $id)
        ->count();

       if($pack->package_type == 0){
         return redirect(url('get_info_package/'.$id))->with('hbd','กรอกวันเกิดนักเรียนด้วยนะจ๊ะ');
       }else{

       }


      $data['objs'] = $pack;

      $data['pack_check'] = $pack_check;
      $data['pack'] = $pack;
      $data['check'] = $check;

      return view('get_free_package', $data);

    }


    public function submit_free_package(Request $request){

      $this->validate($request, [
       'conditions' => 'required'
      ]);

      $packag_id = $request->get('packag_id');
      $conditions = $request->get('conditions');

      $check = DB::table('package_his')
       ->where('user_id', Auth::user()->id)
       ->where('his_type', 1)
       ->count();



        $pack = DB::table('package_products')
         ->where('package_status', 1)
         ->where('id', $packag_id)
         ->first();

         $check_submit = DB::table('submit_packages')
          ->where('user_id', Auth::user()->id)
          ->where('packeage_id', 1)
          ->count();

    //      dd($check_submit);


      if($conditions == null){
        return redirect(url('get_free_package/'.$packag_id))->with('error_po','กรอกวันเกิดนักเรียนด้วยนะจ๊ะ');
      }else{




      /*   if($check == 0){ */



            $start=date("Y-m-d",time());
            $startdatec=strtotime($start);
            $tod=$pack->package_day*86400;
            $ndate=$startdatec+$tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
            $df=date("Y-m-d",$ndate);

            $package = new package_his();
            $package->user_id = Auth::user()->id;
            $package->packeage_id = $packag_id;
            $package->department_id = $pack->department_id;
            $package->start = $start;
            $package->end_date = $df;
            $package->his_type = 1;
            $package->save();

            $the_id = $package->id;

            if($check_submit == 0){

              $pac = new submit_package();
              $pac->user_id = Auth::user()->id;
              $pac->packeage_id = $packag_id;
              $pac->department_id = $pack->department_id;
              $pac->total_day = $pack->package_day;
              $pac->start = $start;
              $pac->end_date = $df;
              $pac->sp_status = 1;
              $pac->save();

            }else{

              return redirect(url('get_free_package/'.$packag_id))->with('error_po','กรอกวันเกิดนักเรียนด้วยนะจ๊ะ');

            /*  DB::table('submit_packages')
              ->where('user_id', Auth::user()->id)
              ->where('department_id', $pack->department_id)
              ->update([
                'packeage_id' => $packag_id,
                'department_id' => $pack->department_id,
                'total_day' => $pack->package_day,
                'start' => $start,
                'end_date' => $df,
              ]); */

            }

            return redirect(url('success_free_package/'.$the_id))->with('success_free','กรอกวันเกิดนักเรียนด้วยนะจ๊ะ');


      /*   }else{

           return redirect(url('get_free_package/'.$packag_id))->with('error_po','กรอกวันเกิดนักเรียนด้วยนะจ๊ะ');

         } */




      }


    }



    public function success_free_package($id){

      $check = DB::table('package_his')
       ->where('user_id', Auth::user()->id)
       ->where('id', $id)
       ->first();

      $pack = DB::table('package_products')
       ->where('id', $check->packeage_id)
       ->first();


       $data['check'] = $check;
       $data['objs'] = $pack;
       return view('success_free_package', $data);

    }
















}
