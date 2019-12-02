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
use Intervention\Image\ImageManagerStatic as Image;
use App\user_payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function search_course(Request $request){

        $search_text = $request['search'];

        if($search_text == null){
          $get_course = null;
          $count_user = 0;
        }else{

          //step 1
          $check_count = DB::table('departments')
          ->Where('name_department','LIKE','%'.$search_text.'%')
                   ->count();

            if($check_count > 0){




              $get_de = DB::table('departments')
              ->Where('name_department','LIKE','%'.$search_text.'%')
                       ->first();

                       $count_course = DB::table('courses')
                                ->Where('department_id', $get_de->id)
                                ->count();

                       $count_user = $count_course;

                      $get_course = DB::table('courses')
                           ->select(
                           'courses.*',
                           'courses.id as A',
                           'typecourses.*',
                           'departments.*',
                           'teachers.*'
                           )
                           ->leftjoin('typecourses', 'typecourses.id', '=', 'courses.type_course')
                           ->leftjoin('departments', 'departments.id', '=', 'courses.department_id')
                           ->leftjoin('teachers', 'teachers.id', '=', 'courses.te_study')
                           ->Where('department_id', $get_de->id)
                           ->where('courses.ch_status', 1)
                           ->orderBy('sort_corse', 'asc')
                           ->paginate(15)
                           ->withPath('?search_text=' . $search_text);

                           if(isset($get_course)){
                             foreach($get_course as $u){

                               $count_video = DB::table('video_lists')
                                     ->where('course_id', $u->A)
                                     ->count();
                                     $u->count_video = $count_video;


                             }
                           }



                            //    dd($get_de);

            }else{



              //step2

              $check_count_2 = DB::table('sub_departments')
              ->Where('name_sub_depart','LIKE','%'.$search_text.'%')
                       ->count();



                    if($check_count_2 > 0){


                      $get_de = DB::table('sub_departments')
                      ->Where('name_sub_depart','LIKE','%'.$search_text.'%')
                               ->get();

                               $get_data_2 = [];

                               foreach($get_de as $u){
                                 $get_data_2[] = $u->id;
                               }

                               $count_course = DB::table('courses')
                                        ->WhereIn('type_course', $get_data_2)
                                        ->count();



                               $count_user = $count_course;

                              $get_course = DB::table('courses')
                                   ->select(
                                   'courses.*',
                                   'courses.id as A',
                                   'typecourses.*',
                                   'departments.*',
                                   'teachers.*'
                                   )
                                   ->leftjoin('typecourses', 'typecourses.id', '=', 'courses.type_course')
                                   ->leftjoin('departments', 'departments.id', '=', 'courses.department_id')
                                   ->leftjoin('teachers', 'teachers.id', '=', 'courses.te_study')
                                   ->WhereIn('type_course', $get_data_2)
                                   ->where('courses.ch_status', 1)
                                   ->orderBy('sort_corse', 'asc')
                                   ->paginate(15)
                                   ->withPath('?search_text=' . $search_text);

                                   if(isset($get_course)){
                                     foreach($get_course as $u){

                                       $count_video = DB::table('video_lists')
                                             ->where('course_id', $u->A)
                                             ->count();
                                             $u->count_video = $count_video;


                                     }
                                   }



                    }else{


                        //step3


                        $check_count_3 = DB::table('courses')
                        ->Where('title_course','LIKE','%'.$search_text.'%')
                                 ->count();


                          if($check_count_3 > 0){



                            $count_course = DB::table('courses')
                                     ->Where('title_course','LIKE','%'.$search_text.'%')
                                     ->count();



                            $count_user = $count_course;

                           $get_course = DB::table('courses')
                                ->select(
                                'courses.*',
                                'courses.id as A',
                                'typecourses.*',
                                'departments.*',
                                'teachers.*'
                                )
                                ->leftjoin('typecourses', 'typecourses.id', '=', 'courses.type_course')
                                ->leftjoin('departments', 'departments.id', '=', 'courses.department_id')
                                ->leftjoin('teachers', 'teachers.id', '=', 'courses.te_study')
                                ->Where('title_course','LIKE','%'.$search_text.'%')
                                ->where('courses.ch_status', 1)
                                ->orderBy('sort_corse', 'asc')
                                ->paginate(15)
                                ->withPath('?search_text=' . $search_text);

                                if(isset($get_course)){
                                  foreach($get_course as $u){

                                    $count_video = DB::table('video_lists')
                                          ->where('course_id', $u->A)
                                          ->count();
                                          $u->count_video = $count_video;


                                  }
                                }




                          }else{


                            $get_course = null;
                            $count_user = 0;

                          }



                    }




            }



        }


        return view('search', compact(['get_course']))
        ->with('search_text', $search_text)
        ->with('get_count', $count_user);

      //  dd($search_text);

    }


    public function about(){
      return view('about');
    }

    public function refer(Request $request){

      $code = $request['code'];

      Session::put('refer_code', $code);

      return redirect(url('register'))->with('success','กรอกวันเกิดนักเรียนด้วยนะจ๊ะ');

    }


    public function payment(){

      $objs = bank::all();

      $data['objs'] = $objs;

      return view('payment', $data);
    }


    public function payment_id($id){

      $objs = bank::all();
      $data['order_id'] = $id;
      $data['objs'] = $objs;

      return view('payment', $data);
    }

    public function teacher_detail($id){

      $package = teacher::find($id);
      $package->te_view += 1;
      $package->save();

      $get_data = DB::table('teachers')->select(
            'teachers.*',
            'departments.*'
            )
            ->leftjoin('departments', 'departments.id',  'teachers.depart_id')
            ->where('teachers.id', $id)
            ->first();

            $data['objs'] = $get_data;



            $count_c = DB::table('courses')
                  ->where('te_study', $id)
                  ->count();

            $data['count_c'] = $count_c;


            $get_course = DB::table('courses')
                ->select(
                'courses.*',
                'courses.id as A',
                'typecourses.*',
                'departments.*',
                'teachers.*'
                )
                ->leftjoin('typecourses', 'typecourses.id', '=', 'courses.type_course')
                ->leftjoin('departments', 'departments.id', '=', 'courses.department_id')
                ->leftjoin('teachers', 'teachers.id', '=', 'courses.te_study')
                ->where('courses.te_study', $id)
                ->where('courses.ch_status', 1)
                ->orderBy('sort_corse', 'asc')
                ->paginate(15);

                if(isset($get_course)){
                  foreach($get_course as $u){

                    $count_video = DB::table('video_lists')
                          ->where('course_id', $u->A)
                          ->count();
                          $u->count_video = $count_video;


                  }
                }



            $data['get_course'] = $get_course;


      return view('teacher_detail', $data);
    }

    public function payment_success(){

      return view('payment_success');
    }



    public function post_payment_notify(Request $request){
      $image = $request->file('image');
      $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'order_id' => 'required',
            'bank' => 'required',
            'money' => 'required',
            'day_tran' => 'required'
      ]);



      if($image == null){

        $package = new user_payment();
        $package->order_id = $request['order_id'];
        $package->name = $request['name'];
        $package->email = $request['email'];
        $package->phone = $request['phone'];
        $package->bank = $request['bank'];
        $package->money = $request['money'];
        $package->day_tran = $request['day_tran'];
        $package->time_tran = $request['time_tran'];
        $package->save();


        $message = $request['name']." ได้ทำการแจ้งชำระเงินมาที่ Order ID : ".$request['order_id']." เบอร์ : ".$request['phone'];
        $lineapi = 'uhXIeORjZqpzKgTsNfBi3S7iopucdn5uRDVG6P4rHIR';

        $mms =  trim($message);
        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=$mms");
        curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);
        if(curl_error($chOne)){
        echo 'error:' . curl_error($chOne);
        }else{
        $result_ = json_decode($result, true);
    //    echo "status : ".$result_['status'];
    //    echo "message : ". $result_['message'];
        }
        curl_close($chOne);

      }else{

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = asset('assets/image/slip/');
        $img = Image::make($image->getRealPath());
        $img->resize(800, 800, function ($constraint) {
        $constraint->aspectRatio();
        })->save('assets/image/slip/'.$input['imagename']);


        $input['imagename_small'] = time().'_small.'.$image->getClientOriginalExtension();

        $img = Image::make($image->getRealPath());
        $img->resize(240, 240, function ($constraint) {
        $constraint->aspectRatio();
      })->save('assets/image/slip/'.$input['imagename_small']);

         $package = new user_payment();
         $package->order_id = $request['order_id'];
         $package->name = $request['name'];
         $package->email = $request['email'];
         $package->phone = $request['phone'];
         $package->bank = $request['bank'];
         $package->money = $request['money'];
         $package->day_tran = $request['day_tran'];
         $package->time_tran = $request['time_tran'];
         $package->image_tran = $input['imagename'];
         $package->save();




         $message = $request['name']." ได้ทำการแจ้งชำระเงินมาที่ Order ID : ".$request['order_id']." เบอร์ : ".$request['phone'];


              $image_thumbnail_url = url('assets/image/slip/'.$input['imagename_small']);  // max size 240x240px JPEG
              $image_fullsize_url = url('assets/image/slip/'.$input['imagename']); //max size 1024x1024px JPEG
              $imageFile = 'copy/240.jpg';
              $sticker_package_id = '';  // Package ID sticker
              $sticker_id = '';    // ID sticker

              $message_data = array(
              'imageThumbnail' => $image_thumbnail_url,
              'imageFullsize' => $image_fullsize_url,
              'message' => $message,
              'imageFile' => $imageFile,
              'stickerPackageId' => $sticker_package_id,
              'stickerId' => $sticker_id
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
          //  echo "status : ".$result_['status'];
          //  echo "message : ". $result_['message'];
            }
            curl_close($chOne);

      }




      $get_count = DB::table('submitcourses')
        ->where('order_id', $request['order_id'])
        ->count();

        if($get_count > 0){

          $upobj = DB::table('submitcourses')
              ->where('order_id', $request['order_id'])
              ->update(array(
                'status' => 1
              ));

        }




      return redirect(url('payment_success/'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }



    public function faq(){
      return view('faq');
    }

    public function privacy_policy(){
      return view('privacy_policy');
    }

    public function terms_conditions(){
      return view('terms_conditions');
    }

    public function returns_exchanges(){
      return view('returns_exchanges');
    }

    public function blog(){



      $objs = DB::table('blogs')
          ->orderBy('id', 'desc')
          ->paginate(15);

      $data['objs'] = $objs;
      return view('blog', $data);
    }


    public function blog_detail($id){

      $package = blog::find($id);
      $package->view += 1;
      $package->save();

      $objs = DB::table('blogs')->select(
          'blogs.*'
          )
          ->where('id', $id)
          ->first();

          $man = explode(',', $objs->tags);
          $count_tags = count($man);

          $data['man'] = $man;
          $data['count_tags'] = $count_tags;

      //    dd($objs);

          $data['objs'] = $objs;
    return view('blog_detail',$data);

    }




    public function teachers(){

      $objs = DB::table('teachers')
          ->orderBy('id', 'desc')
          ->paginate(15);

      $data['objs'] = $objs;
      return view('teachers', $data);
    }

    public function contact(){
      return view('contact');
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


              $get_cource = DB::table('courses')
                  ->select(
                  'courses.price_course',
                  'courses.id'
                  )
                  ->where('id', $get_coupon->c_price_product)
                  ->first();

            //  max_price = course

          if($get_coupon_count > 0){


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




    public function home_test(){

      $slide = DB::table('slide_shows')->select(
            'slide_shows.*'
            )
            ->where('slide_status', 1)
            ->get();
      $data['slide'] = $slide;

      $objs = DB::table('courses')
          ->select(
          'courses.*',
          'courses.id as A',
          'typecourses.*'
          )
          ->leftjoin('typecourses', 'typecourses.id', '=', 'courses.type_course')
          ->where('courses.ch_status', 1)
          ->orderBy('sort_corse', 'asc')
          ->limit(16)
          ->get();

      $data['objs'] = $objs;
      return view('test_home', $data);

    }

    public function course_details($id){

      $objs = DB::table('courses')
          ->select(
          'courses.*',
          'courses.id as A',
          'courses.created_at as created_ats',
          'typecourses.*',
          'departments.*',
          'teachers.*'
          )
          ->leftjoin('typecourses', 'typecourses.id', '=', 'courses.type_course')
          ->leftjoin('departments', 'departments.id', '=', 'courses.department_id')
          ->leftjoin('teachers', 'teachers.id', '=', 'courses.te_study')
          ->where('courses.id', $id)
          ->where('courses.ch_status', 1)
          ->orderBy('sort_corse', 'asc')
          ->first();

        $man = explode(',', $objs->tags);
        $count_tags = count($man);

        $data['man'] = $man;
        $data['count_tags'] = $count_tags;
      //  dd($man);


              $count_video = DB::table('video_lists')
                    ->where('course_id', $objs->A)
                    ->count();
                    $objs->count_video = $count_video;

                    $get_video = DB::table('video_lists')
                          ->where('course_id', $objs->A)
                          ->orderBy('order_sort', 'asc')
                          ->get();


                          $filecourses = DB::table('filecourses')
                                ->where('course_id', $objs->A)
                                ->get();



                          $get_video_ex = DB::table('example_videos')
                                ->where('course_id', $objs->A)
                                ->first();
                              //  $objs->get_video_ex = $get_video_ex;

                            //    dd($get_video_ex);


          $data['objs'] = $objs;
          $data['get_video_ex'] = $get_video_ex;
          $data['get_video'] = $get_video;

          $data['filecourses'] = $filecourses;



      return view('course_details', $data);
    }


    public function all_course(){





                  $get_count = DB::table('courses')
                        ->count();


                        $get_course = DB::table('courses')
                            ->select(
                            'courses.*',
                            'courses.id as A',
                            'typecourses.*',
                            'departments.*',
                            'teachers.*'
                            )
                            ->leftjoin('typecourses', 'typecourses.id', '=', 'courses.type_course')
                            ->leftjoin('departments', 'departments.id', '=', 'courses.department_id')
                            ->leftjoin('teachers', 'teachers.id', '=', 'courses.te_study')
                            ->where('courses.ch_status', 1)
                            ->orderBy('sort_corse', 'asc')
                            ->paginate(15);

                            if(isset($get_course)){
                              foreach($get_course as $u){

                                $count_video = DB::table('video_lists')
                                      ->where('course_id', $u->A)
                                      ->count();
                                      $u->count_video = $count_video;


                              }
                            }



          //  dd($cats);
      $data['get_course'] = $get_course;
      $data['get_count'] = $get_count;
      return view('all_course', $data);

    }



    public function course_department($id){

      $cats = DB::table('departments')
            ->where('id', $id)
            ->first();

            $get_sub = DB::table('sub_departments')
                  ->where('id_depart', $cats->id)
                  ->get();

                  $get_count = DB::table('courses')
                        ->where('department_id', $cats->id)
                        ->count();


                        $get_course = DB::table('courses')
                            ->select(
                            'courses.*',
                            'courses.id as A',
                            'typecourses.*',
                            'departments.*',
                            'teachers.*'
                            )
                            ->leftjoin('typecourses', 'typecourses.id', '=', 'courses.type_course')
                            ->leftjoin('departments', 'departments.id', '=', 'courses.department_id')
                            ->leftjoin('teachers', 'teachers.id', '=', 'courses.te_study')
                            ->where('courses.department_id', $cats->id)
                            ->where('courses.ch_status', 1)
                            ->orderBy('sort_corse', 'asc')
                            ->get();

                            if(isset($get_course)){
                              foreach($get_course as $u){

                                $count_video = DB::table('video_lists')
                                      ->where('course_id', $u->A)
                                      ->count();
                                      $u->count_video = $count_video;


                              }
                            }



          //  dd($cats);
      $data['get_course'] = $get_course;
      $data['get_count'] = $get_count;
      $data['get_sub'] = $get_sub;
      $data['objs'] = $cats;
      return view('course_department', $data);

    }


    public function category($id){


      $cats = DB::table('sub_departments')
            ->where('id', $id)
            ->first();

            $get_sub = DB::table('sub_departments')
                  ->where('id_depart', $cats->id_depart)
                  ->get();

                  $get_count = DB::table('courses')
                        ->where('type_course', $cats->id)
                        ->count();


                        $get_course = DB::table('courses')
                            ->select(
                            'courses.*',
                            'courses.id as A',
                            'typecourses.*',
                            'departments.*',
                            'teachers.*'
                            )
                            ->leftjoin('typecourses', 'typecourses.id', '=', 'courses.type_course')
                            ->leftjoin('departments', 'departments.id', '=', 'courses.department_id')
                            ->leftjoin('teachers', 'teachers.id', '=', 'courses.te_study')
                            ->where('courses.type_course', $cats->id)
                            ->where('courses.ch_status', 1)
                            ->orderBy('sort_corse', 'asc')
                            ->get();

                            if(isset($get_course)){
                              foreach($get_course as $u){

                                $count_video = DB::table('video_lists')
                                      ->where('course_id', $u->A)
                                      ->count();
                                      $u->count_video = $count_video;


                              }
                            }



          //  dd($cats);
      $data['get_course'] = $get_course;
      $data['get_count'] = $get_count;
      $data['get_sub'] = $get_sub;
      $data['objs'] = $cats;
      return view('category', $data);
    }



    public function home()
    {
      session()->forget('coupon');

      $get_cat = DB::table('departments')
            ->where('de_status', 1)
            ->get();


      $slide = DB::table('slide_shows')->select(
            'slide_shows.*'
            )
            ->where('slide_status', 1)
            ->first();
      $data['slide'] = $slide;



      $objs = DB::table('courses')
          ->select(
          'courses.*',
          'courses.id as A',
          'typecourses.*',
          'departments.*',
          'teachers.*'
          )
          ->leftjoin('typecourses', 'typecourses.id', '=', 'courses.type_course')
          ->leftjoin('departments', 'departments.id', '=', 'courses.department_id')
          ->leftjoin('teachers', 'teachers.id', '=', 'courses.te_study')
          ->whereIn('departments.id', [4, 5, 6])
          ->where('courses.ch_status', 1)
          ->inRandomOrder()
          ->limit(8)
          ->get();

          if(isset($objs)){
            foreach($objs as $u){

              $count_video = DB::table('video_lists')
                    ->where('course_id', $u->A)
                    ->count();
                    $u->count_video = $count_video;


            }
          }







          $objs2 = DB::table('courses')
              ->select(
              'courses.*',
              'courses.id as A',
              'typecourses.*',
              'departments.*',
              'teachers.*'
              )
              ->leftjoin('typecourses', 'typecourses.id', '=', 'courses.type_course')
              ->leftjoin('departments', 'departments.id', '=', 'courses.department_id')
              ->leftjoin('teachers', 'teachers.id', '=', 'courses.te_study')
              ->whereIn('departments.id', [7, 8])
              ->where('courses.ch_status', 1)
              ->inRandomOrder()
              ->limit(8)
              ->get();

              if(isset($objs2)){
                foreach($objs2 as $u){

                  $count_video = DB::table('video_lists')
                        ->where('course_id', $u->A)
                        ->count();
                        $u->count_video = $count_video;


                }
              }



              $objs3 = DB::table('courses')
                  ->select(
                  'courses.*',
                  'courses.id as A',
                  'typecourses.*',
                  'departments.*',
                  'teachers.*'
                  )
                  ->leftjoin('typecourses', 'typecourses.id', '=', 'courses.type_course')
                  ->leftjoin('departments', 'departments.id', '=', 'courses.department_id')
                  ->leftjoin('teachers', 'teachers.id', '=', 'courses.te_study')
                  ->whereIn('departments.id', [9])
                  ->where('courses.ch_status', 1)
                  ->inRandomOrder()
                  ->limit(8)
                  ->get();

                  if(isset($objs3)){
                    foreach($objs3 as $u){

                      $count_video = DB::table('video_lists')
                            ->where('course_id', $u->A)
                            ->count();
                            $u->count_video = $count_video;


                    }
                  }


          $pack = DB::table('package_products')
           ->where('package_status', 1)
           ->orderBy('package_sort', 'asc')
           ->get();

          $data['pack'] = $pack;

      $data['get_cat'] = $get_cat;
      $data['objs'] = $objs;
      $data['objs2'] = $objs2;
      $data['objs3'] = $objs3;
      return view('welcome', $data);
    }

    public function course()
    {

      $get_cat = DB::table('departments')
            ->get();

      session()->forget('coupon');

      $objs = DB::table('courses')
          ->select(
          'courses.*',
          'courses.id as A',
          'typecourses.*',
          'departments.*'
          )
          ->leftjoin('typecourses', 'typecourses.id', '=', 'courses.type_course')
          ->leftjoin('departments', 'departments.id', '=', 'courses.department_id')
          ->where('typecourses.id', 2)
          ->where('courses.ch_status', 1)
          ->orderBy('sort_corse', 'asc')
          ->get();


      $data['get_cat'] = $get_cat;
      $data['objs'] = $objs;
      return view('course.index', $data);
    }


    public function course_free()
    {
      $get_cat = DB::table('departments')
            ->get();

            $objs = DB::table('courses')
                ->select(
                'courses.*',
                'courses.id as A',
                'typecourses.*',
                'departments.*'
                )
                ->leftjoin('typecourses', 'typecourses.id', '=', 'courses.type_course')
                ->leftjoin('departments', 'departments.id', '=', 'courses.department_id')
                ->where('typecourses.id', 3)
                ->where('courses.ch_status', 1)
                ->orderBy('sort_corse', 'asc')
                ->get();

          $data['get_cat'] = $get_cat;
          $data['objs'] = $objs;

      return view('course.course_free', $data);
    }

    public function Teaching()
    {

      $get_cat = DB::table('departments')
            ->get();

            $objs = DB::table('courses')
                ->select(
                'courses.*',
                'courses.id as A',
                'typecourses.*',
                'departments.*'
                )
                ->leftjoin('typecourses', 'typecourses.id', '=', 'courses.type_course')
                ->leftjoin('departments', 'departments.id', '=', 'courses.department_id')
                ->where('typecourses.id', 1)
                ->where('courses.ch_status', 1)
                ->orderBy('sort_corse', 'asc')
                ->get();

          $data['get_cat'] = $get_cat;
          $data['objs'] = $objs;
      return view('course.teaching', $data);
    }

}
