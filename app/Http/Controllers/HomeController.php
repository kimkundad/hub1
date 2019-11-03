<?php

namespace App\Http\Controllers;


use App\course;
use App\coupon_user;
use App\Http\Requests;
use Session;
use Auth;
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


    public function about(){
      return view('about');
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
            ->limit(8)
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
          ->orderBy('sort_corse', 'asc')
          ->limit(3)
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
              ->orderBy('sort_corse', 'asc')
              ->limit(3)
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
                  ->orderBy('sort_corse', 'asc')
                  ->limit(3)
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
