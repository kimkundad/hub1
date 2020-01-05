<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\course;
use App\contact;
use App\typecourses;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Excel;
use File;
use Session;
use App\Users;
use App\filecourse;
use App\submitcourse;
use App\bank;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;
use App\qrcode;
use App\comment;
use Response;
use App\coupon_user;

class BuycourseController extends Controller
{
    //
    public function buy_course($id){

      $packag_id = $id;

      $pack = DB::table('courses')
       ->where('ch_status', 1)
       ->where('id', $id)
       ->first();

       $set_num_date = (\random_int(1000, 9999));
       $randomSixDigitInt = 'ORDER-'.(\random_int(1000, 9999)).'-'.(\random_int(1000, 9999)).'-'.(\random_int(1000, 9999));
       //dd($set_num_date);
       $data['order_id'] = $randomSixDigitInt;
       $data['rand'] = $set_num_date;

       $data['objs'] = $pack;
      return view('buy_course', $data);
    }


    public function bil_course(){

      return view('bil_course');
    }




    public function submit_buy_course_2(Request $request){

    //  dd($request->master_price);


    session()->forget('coupon');

    $package = new submitcourse();
    $package->user_id = Auth::user()->id;
    $package->course_id = $request->course_id;
    $package->order_id = $request->order_id;
    $package->save();


    $coursess_de = DB::table('submitcourses')
      ->select(
         'submitcourses.*',
         'submitcourses.user_id as Uid',
         'submitcourses.id as Oid',
         'submitcourses.created_at as created_ats',
         'users.*',
         'courses.*'
         )
      ->where('submitcourses.user_id', Auth::user()->id)
      ->where('submitcourses.id', $package->id)
      ->leftjoin('users', 'users.id', '=', 'submitcourses.user_id')
      ->leftjoin('courses', 'courses.id', '=', 'submitcourses.course_id')
      ->first();

    $check_coupon = DB::table('coupon_users')
           ->select(
           'coupon_users.*'
           )
           ->where('order_id', $package->order_id)
           ->count();

           $get_cource = DB::table('courses')
               ->select(
               'courses.price_course',
               'courses.id'
               )
               ->where('id', $request->course_id)
               ->first();


           if($check_coupon > 0){

             $get_coupon = DB::table('coupon_users')
                 ->select(
                 'coupon_users.*'
                 )
                 ->where('order_id', $request->order_id)
                 ->first();


                 $get_coupon_master = DB::table('coupons')
                     ->select(
                     'coupons.*'
                     )
                     ->where('id', $get_coupon->c_id)
                     ->first();


                     if($get_coupon_master->c_type == 1){

                       $send_price = (($get_cource->price_course*$get_coupon_master->c_price)/100);

                       $coursess_de->discount_price = $send_price;

                     }else{


                       $send_price = $get_coupon_master->c_price;

                      $coursess_de->discount_price = $send_price;

                     }


                     $package = submitcourse::find($package->id);
                     $package->discount = $send_price;
                     $package->save();



           }else{

             $coursess_de->discount_price = 0;


             $package = submitcourse::find($package->id);
             $package->discount = 0;
             $package->save();

           }



           //////////////////////////////  email








           // send email
             $data_toview = array();
           //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";
             date_default_timezone_set("Asia/Bangkok");
             $data_toview['data'] = $coursess_de;
             $data_toview['datatime'] = date("d-m-Y H:i:s");

             $email_sender   = 'Hubjungacademy@gmail.com';
             $email_pass     = 'hub12345678';

         /*    $email_sender   = 'info@acmeinvestor.com';
             $email_pass     = 'Iaminfoacmeinvestor';  */
             $email_to       =  $coursess_de->email;
             //echo $admins[$idx]['email'];
             // Backup your default mailer
             $backup = \Mail::getSwiftMailer();

             try{

                           //https://accounts.google.com/DisplayUnlockCaptcha
                         // Setup your gmail mailer
                         $transport = new \Swift_SmtpTransport('smtp.gmail.com', 465, 'SSL');
                         $transport->setUsername($email_sender);
                         $transport->setPassword($email_pass);

                         // Any other mailer configuration stuff needed...
                         $gmail = new Swift_Mailer($transport);

                         // Set the mailer as gmail
                         \Mail::setSwiftMailer($gmail);

                         $data['emailto'] = $email_sender;
                         $data['sender'] = $email_to;
                         //Sender dan Reply harus sama

                         Mail::send('mails.index2', $data_toview, function($message) use ($data)
                         {
                             $message->from($data['sender'], 'Hubjung');
                             $message->to($data['sender'])
                             ->replyTo($data['sender'], 'Hubjung.')
                             ->subject('ใบเสร็จสำหรับการสั่งซื้อคอร์สเรียน Hubjung ');

                             //echo 'Confirmation email after registration is completed.';
                         });


                         Mail::send('mails.index2', $data_toview, function($message) use ($data)
                         {
                             $message->from($data['sender'], 'Hubjung');
                             $message->to($data['emailto'])
                             ->replyTo($data['sender'], 'Hubjung.')
                             ->subject('ใบเสร็จสำหรับการสั่งซื้อคอร์สเรียน Hubjung ');

                             //echo 'Confirmation email after registration is completed.';
                         });

             }catch(\Swift_TransportException $e){
                 $response = $e->getMessage() ;
                 echo $response;

             }


             // Restore your original mailer
             Mail::setSwiftMailer($backup);
             // send email




              $message = Auth::user()->name." ได้สั่งซื้อ : ".$coursess_de->title_course.", ราคา :".$coursess_de->price_course;

                $message_data = array(
                'message' => $message
                );

              $lineapi = 'uhXIeORjZqpzKgTsNfBi3S7iopucdn5uRDVG6P4rHIR';
              $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$lineapi );
              $mms =  trim($message);
              $chOne = curl_init();
              curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
              curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
              curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
              curl_setopt($chOne, CURLOPT_POST, 1);
              curl_setopt($chOne, CURLOPT_POSTFIELDS, $message_data);
              curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
              curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
              curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
              $result = curl_exec($chOne);
              if(curl_error($chOne)){
              echo 'error:' . curl_error($chOne);
              }else{
              $result_ = json_decode($result, true);
              echo "status : ".$result_['status'];
              echo "message : ". $result_['message'];
              }
              curl_close($chOne);

              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




           //////////////////////////////  email




           $set_num_date = (\random_int(1000, 9999));





           return view('bil_course_gbpay')->with([
           'objs' =>$coursess_de,
           'course_id' =>$request->course_id,
           'order_id' =>$request->order_id,
           'user_id' =>Auth::user()->id,
           'master_price' => $request->master_price,
           'rand' => $set_num_date,
           'bill' =>"บิลเลขที่"
         ]);


    }

    public function submit_buy_course(Request $request){

    //  dd($request->value_money);

      if($request->value_money == 0){

        $package = new submitcourse();
        $package->user_id = Auth::user()->id;
        $package->course_id = $request->course_id;
        $package->order_id = $request->order_id;
        $package->status = 2;
        $package->save();

      }else{

        $package = new submitcourse();
        $package->user_id = Auth::user()->id;
        $package->course_id = $request->course_id;
        $package->order_id = $request->order_id;
        $package->save();

      }


    //  dd($request->master_price);
        session()->forget('coupon');




        $coursess_de = DB::table('submitcourses')
          ->select(
             'submitcourses.*',
             'submitcourses.user_id as Uid',
             'submitcourses.id as Oid',
             'submitcourses.created_at as created_ats',
             'users.*',
             'courses.*'
             )
          ->where('submitcourses.user_id', Auth::user()->id)
          ->where('submitcourses.id', $package->id)
          ->leftjoin('users', 'users.id', '=', 'submitcourses.user_id')
          ->leftjoin('courses', 'courses.id', '=', 'submitcourses.course_id')
          ->first();

        $check_coupon = DB::table('coupon_users')
               ->select(
               'coupon_users.*'
               )
               ->where('order_id', $package->order_id)
               ->count();

               $get_cource = DB::table('courses')
                   ->select(
                   'courses.price_course',
                   'courses.id'
                   )
                   ->where('id', $request->course_id)
                   ->first();


               if($check_coupon > 0){

                 $get_coupon = DB::table('coupon_users')
                     ->select(
                     'coupon_users.*'
                     )
                     ->where('order_id', $request->order_id)
                     ->first();


                     $get_coupon_master = DB::table('coupons')
                         ->select(
                         'coupons.*'
                         )
                         ->where('id', $get_coupon->c_id)
                         ->first();


                         if($get_coupon_master->c_type == 1){

                           $send_price = (($get_cource->price_course*$get_coupon_master->c_price)/100);

                           $coursess_de->discount_price = $send_price;

                         }else{


                           $send_price = $get_coupon_master->c_price;

                          $coursess_de->discount_price = $send_price;

                         }
                         $coursess_de->time_course;

                          $start=date("Y-m-d",time());
                          $startdatec=strtotime($start);
                          $tod=$coursess_de->time_course*86400;
                          $ndate=$startdatec+$tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
                          $df=date("Y-m-d",$ndate);

                         $package = submitcourse::find($package->id);
                         $package->discount = $send_price;
                         $package->start = $start;
                         $package->end_date = $df;
                         $package->save();



               }else{

                 $coursess_de->discount_price = 0;

                 $start=date("Y-m-d",time());
                 $startdatec=strtotime($start);
                 $tod=$coursess_de->time_course*86400;
                 $ndate=$startdatec+$tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
                 $df=date("Y-m-d",$ndate);


                 $package = submitcourse::find($package->id);
                 $package->discount = 0;
                 $package->start = $start;
                 $package->end_date = $df;
                 $package->save();

               }



               //////////////////////////////  email








               // send email
                 $data_toview = array();
               //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";
                 date_default_timezone_set("Asia/Bangkok");
                 $data_toview['data'] = $coursess_de;
                 $data_toview['datatime'] = date("d-m-Y H:i:s");

                 $email_sender   = 'Hubjungacademy@gmail.com';
                 $email_pass     = 'hub12345678';

             /*    $email_sender   = 'info@acmeinvestor.com';
                 $email_pass     = 'Iaminfoacmeinvestor';  */
                 $email_to       =  $coursess_de->email;
                 //echo $admins[$idx]['email'];
                 // Backup your default mailer
                 $backup = \Mail::getSwiftMailer();

                 try{

                               //https://accounts.google.com/DisplayUnlockCaptcha
                             // Setup your gmail mailer
                             $transport = new \Swift_SmtpTransport('smtp.gmail.com', 465, 'SSL');
                             $transport->setUsername($email_sender);
                             $transport->setPassword($email_pass);

                             // Any other mailer configuration stuff needed...
                             $gmail = new Swift_Mailer($transport);

                             // Set the mailer as gmail
                             \Mail::setSwiftMailer($gmail);

                             $data['emailto'] = $email_sender;
                             $data['sender'] = $email_to;
                             //Sender dan Reply harus sama

                             Mail::send('mails.index2', $data_toview, function($message) use ($data)
                             {
                                 $message->from($data['sender'], 'Hubjung');
                                 $message->to($data['sender'])
                                 ->replyTo($data['sender'], 'Hubjung.')
                                 ->subject('ใบเสร็จสำหรับการสั่งซื้อคอร์สเรียน Hubjung ');

                                 //echo 'Confirmation email after registration is completed.';
                             });


                             Mail::send('mails.index2', $data_toview, function($message) use ($data)
                             {
                                 $message->from($data['sender'], 'Hubjung');
                                 $message->to($data['emailto'])
                                 ->replyTo($data['sender'], 'Hubjung.')
                                 ->subject('ใบเสร็จสำหรับการสั่งซื้อคอร์สเรียน Hubjung ');

                                 //echo 'Confirmation email after registration is completed.';
                             });

                 }catch(\Swift_TransportException $e){
                     $response = $e->getMessage() ;
                    // echo $response;

                 }


                 // Restore your original mailer
                 Mail::setSwiftMailer($backup);
                 // send email




                  $message = Auth::user()->name." ได้สั่งซื้อ : ".$coursess_de->title_course.", ราคา :".$coursess_de->price_course;

                    $message_data = array(
                    'message' => $message
                    );

                  $lineapi = 'uhXIeORjZqpzKgTsNfBi3S7iopucdn5uRDVG6P4rHIR';
                  $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$lineapi );
                  $mms =  trim($message);
                  $chOne = curl_init();
                  curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
                  curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
                  curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
                  curl_setopt($chOne, CURLOPT_POST, 1);
                  curl_setopt($chOne, CURLOPT_POSTFIELDS, $message_data);
                  curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
                  curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
                  curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
                  $result = curl_exec($chOne);
                  if(curl_error($chOne)){
                  echo 'error:' . curl_error($chOne);
                  }else{
                  $result_ = json_decode($result, true);
                  echo "status : ".$result_['status'];
                  echo "message : ". $result_['message'];
                  }
                  curl_close($chOne);

                  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




               //////////////////////////////  email




               if($request->value_money == 0){

                 return view('bil_course_free')->with([
                 'objs' =>$coursess_de,
                 'bill' =>"บิลเลขที่"
               ]);

               }else{

                 return view('bil_course')->with([
                 'objs' =>$coursess_de,
                 'bill' =>"บิลเลขที่"
               ]);

               }







    }


    public function post_contact(Request $request){


      $token = $request['g_response'];

    //  dd($token);

      if ($token) {

        $obj = new contact();
         $obj->name = $request['name_user'];
         $obj->email = $request['email'];
         $obj->phone = $request['phone'];
         $obj->detail = $request['message'];
         $obj->save();

         $response = array(
             'status' => 'success',
             'msg' => 'คุณสามารถใช้ Coupon นี้ได้',
         );

      }else{

        $response = array(
            'status' => 'error',
            'msg' => 'คุณไม่สามารถใช้ Coupon นี้ได้ Coupon ได้ถูกใช้ไปหมดแล้ว',
        );

      }

      return response()->json($response);

    }


    public function post_coupon(Request $request){

      $get_coupon_count = DB::table('coupons')
          ->select(
          'coupons.*'
          )
          ->where('c_code', $request->coupon)
          ->count();



          $get_coupon = DB::table('coupons')
              ->select(
              'coupons.*'
              )
              ->where('c_code', $request->coupon)
              ->first();




            //  max_price = course

          if($get_coupon_count > 0){

            $get_cource = DB::table('courses')
                ->select(
                'courses.price_course',
                'courses.id'
                )
                ->where('id', $get_coupon->c_price_product)
                ->first();


            $check_limit = DB::table('coupon_users')
                ->select(
                'coupon_users.*'
                )
                ->where('c_id', $get_coupon->id)
                ->where('coupon_status', 1)
                ->count();


                if($check_limit >= $get_coupon->c_max){

                  $response = array(
                      'status' => 'error',
                      'msg' => 'คุณไม่สามารถใช้ Coupon นี้ได้ Coupon ได้ถูกใช้ไปหมดแล้ว',
                  );

                }else{




                  if($request->max_price == $get_coupon->c_price_product){

                    $get_coupons = DB::table('coupons')
                        ->select(
                        'coupons.*'
                        )
                        ->where('c_code', $request->coupon)
                        ->first();

                        if($get_coupon->c_type == 1){

                          $send_price = (($get_cource->price_course*$get_coupon->c_price)/100);

                        }else{

                          $send_price = $get_coupon->c_price;
                        }

                        Session::put('coupon', ['code' => $get_coupon->c_code, 'id' => $get_coupon->id, 'price' => $send_price, 'course' => $get_coupon->c_price_product, 'type' => 0]);


                        $obj = new coupon_user();
                        $obj->user_id = Auth::user()->id;
                        $obj->c_id = $get_coupon->id;
                        $obj->order_id = $request->order_id;
                        $obj->save();

                    $response = array(
                        'status' => 'success',
                        'msg' => 'คุณสามารถใช้ Coupon นี้ได้',
                        'coupon' => $send_price,
                    );

                  }else{


                    if($get_coupon->c_price_product == 0){

                      $get_cource = DB::table('courses')
                          ->select(
                          'courses.price_course',
                          'courses.id'
                          )
                          ->where('id', $request->max_price)
                          ->first();



                      $get_coupons = DB::table('coupons')
                          ->select(
                          'coupons.*'
                          )
                          ->where('c_code', $request->coupon)
                          ->first();

                        //  $sum_price_type = 0;

                          if($get_coupon->c_type == 1){

                            $send_price = (($get_cource->price_course*$get_coupon->c_price)/100);

                          }else{

                            $send_price = $get_coupon->c_price;
                          }



                        //  $sum_price_type = (($get_cource->price_course*$get_coupon->c_price)/100);

                          Session::put('coupon', ['code' => $get_coupon->c_code, 'id' => $get_coupon->id, 'price' => $send_price, 'course' => $get_coupon->c_price_product, 'type' => 1]);
                          $obj = new coupon_user();
                          $obj->user_id = Auth::user()->id;
                          $obj->c_id = $get_coupon->id;
                          $obj->order_id = $request->order_id;
                          $obj->save();

                      $response = array(
                          'status' => 'success',
                          'msg' => 'คุณสามารถใช้ Coupon นี้ได้',
                          'coupon' => $send_price,
                      );



                    }else{

                      $response = array(
                          'status' => 'error',
                          'msg' => 'คุณไม่สามารถใช้ Coupon นี้ได้ Coupon กับ Course ไม่ตรงกับที่ระบุไว้',
                          'coupon' => 'คุณไม่สามารถใช้ Coupon นี้ได้ Coupon กับ Course ไม่ตรงกับที่ระบุไว้',
                      );

                    }



                  }





                }





          }else{

            $response = array(
                'status' => 'error',
                'msg' => 'คุณไม่สามารถใช้ Coupon นี้ได้',
            );

          }


    //  dd($get_coupon_count);



      return response()->json($response);

    }


















}
