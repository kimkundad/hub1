<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Users;
use App\wishlist;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class UserprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(){
      $objs = DB::table('users')
          ->select(
          'users.*',
          'levels.*',
          'levels.id as level_user'
          )
          ->leftjoin('levels', 'levels.points', '>=', 'users.point_level')
          ->where('users.id', Auth::user()->id)
          ->first();
        //  dd($objs);
      $data['objs'] = $objs;
      $data['method'] = "put";
      return view('user_profile.user_profile', $data);
    }




    public function my_friends(){

      $id = Auth::user()->id;




      $objs = DB::table('users')
          ->where('users.id', Auth::user()->id)
          ->first();

          if($objs->code_user == null){

            $randomSixDigitInt = (\random_int(1000, 9999)).'_'.(\random_int(1000, 9999)).'_'.(\random_int(1000, 9999));


            $objs1 = DB::table('users')
              ->where('id', $id)
              ->update(['code_user' => $randomSixDigitInt]);


              $get_friend = DB::table('users')
                  ->where('refer_code', $objs1->code_user)
                  ->get();



          }else{

            $objs1 = DB::table('users')
                ->where('users.id', Auth::user()->id)
                ->first();


                $get_friend = DB::table('users')
                    ->where('refer_code', $objs1->code_user)
                    ->get();


          }


      $data['get_friend'] = $get_friend;
      $data['objs'] = $objs1;
      return view('user_profile.my_friends', $data);
    }


    public function my_package(){
      $s = 0;

      $course_chart = DB::table('answers')->select(
        'answers.*'
        )
        ->where('answers.user_id', Auth::user()->id)
        ->orderBy('answers.id_option', 'desc')
        ->groupBy('answers.id_option')
        ->get();

      // dd($course_chart);


      foreach($course_chart as $u){
        $s++;
      }
        $data['ex_count'] = $s;

      //  dd($ex_count);

      $id = Auth::user()->id;
      $user = Users::find($id);

      $package_count = DB::table('submit_packages')
        ->where('user_id', $id)
        ->count();

      $package = DB::table('submit_packages')
        ->select(
           'submit_packages.*',
           'submit_packages.user_id as Uid',
           'submit_packages.id as Oid',
           'submit_packages.created_at as Dcre',
           'users.*',
           'users.id as Ustudent',
           'package_products.*',
           'package_products.id as id_cource'
           )
        ->leftjoin('users', 'users.id', '=', 'submit_packages.user_id')
        ->leftjoin('package_products', 'package_products.id', '=', 'submit_packages.packeage_id')
        ->where('submit_packages.user_id', $id)
        ->get();



        if(isset($package)){
          foreach($package as $u){


            $str_start = strtotime($u->start); // ทำวันที่ให้อยู่ในรูปแบบ timestamp
            $str_end = strtotime($u->end_date); // ทำวันที่ให้อยู่ในรูปแบบ timestamp
            $nseconds = $str_end - $str_start; // วันที่ระหว่างเริ่มและสิ้นสุดมาลบกัน
            $ndays = round($nseconds / 86400); // หนึ่งวันมี 86400 วินาที

            $total_day = $ndays;

            $u->total_day = $total_day;

          }
        }



        $order = DB::table('package_his')
          ->select(
             'package_his.*',
             'package_his.user_id as Uid',
             'package_his.id as Oid',
             'package_his.created_at as Dcre',
             'users.*',
             'users.id as Ustudent',
             'package_products.*',
             'package_products.id as id_cource'
             )
          ->leftjoin('users', 'users.id', '=', 'package_his.user_id')
          ->leftjoin('package_products', 'package_products.id', '=', 'package_his.packeage_id')
          ->where('package_his.user_id', $id)
          ->where('package_his.his_status', 0)
          ->where('package_his.his_type', 0)
          ->get();





      //  dd($order);

      $count_his = DB::table('package_his')
        ->where('package_his.user_id', $id)
        ->count();

      $pack = DB::table('package_products')
       ->where('package_status', 1)
       ->orderBy('package_sort', 'asc')
       ->get();

       $data['count_his'] = $count_his;
      $data['pack'] = $pack;
      $data['order'] = $order;
      $data['package'] = $package;
      $data['package_count'] = $package_count;

      //dd($user);
      $data['user'] = $user;

      return view('user_profile.my_pack', $data);
    }


    public function my_example(){

      $course_chart = DB::table('answers')->select(
        'answers.*',
        'answers.id as id_a',
        'answers.created_at as created_ats',
        'examples.*',
        'examples.id as id_e',
        'courses.title_course',
        'categories.*'
        )
        ->leftjoin('examples', 'examples.id', '=', 'answers.examples_id')
        ->leftjoin('courses', 'courses.id', '=', 'examples.course_id')
        ->leftjoin('categories', 'categories.id', '=', 'examples.category_id')
        ->where('answers.user_id', Auth::user()->id)
        ->orderBy('answers.id', 'desc')
        ->groupBy('answers.id_option')
        ->get();

        if(isset($course_chart)){
          foreach($course_chart as $u){

            $options = DB::table('questions')->where('category_id',$u->id_e)->count();
            $u->options = $options;

            $sum_ans = DB::table('answers')
              ->where('id_option', $u->id_option)
              ->sum('ans_status');
              $u->sum_ans = $sum_ans;
          }
        }

      //  dd($course_chart);

      $data['pack'] = $course_chart;
      return view('user_profile.my_example', $data);
    }


    public function my_payment(){
      $id = Auth::user()->id;

      $pack = DB::table('package_his')
        ->select(
           'package_his.*',
           'package_his.user_id as Uid',
           'package_his.id as Oid',
           'package_his.created_at as Dcre',
           'users.*',
           'users.id as Ustudent',
           'banks.*',
           'package_products.*',
           'package_products.id as id_cource'
           )
        ->leftjoin('users', 'users.id', '=', 'package_his.user_id')
        ->leftjoin('package_products', 'package_products.id', '=', 'package_his.packeage_id')
        ->leftjoin('banks', 'banks.id', '=', 'package_his.bank_id')
        ->where('package_his.user_id', $id)
        ->get();




      $user = Users::find($id);
    //  dd($pack);
      $data['user'] = $user;
      $data['pack'] = $pack;
      return view('user_profile.my_payment', $data);
    }


    public function my_course(){

      $check = DB::table('wishlists')
        ->where('user_id', Auth::user()->id)
        ->count();

        if($check > 0){

          $get_date = DB::table('wishlists')
            ->where('user_id', Auth::user()->id)
            ->get();

            $get_course = [];

            foreach($get_date as $u){

              $get_c1 = DB::table('courses')
                ->where('id', $u->course_id)
                ->first();

                $get_course[] = $get_c1;

                $get_date->get_c = $get_course;
            }

        }else{
          $get_date = null;
        }

      //  dd($get_date);

        $data['objs'] = $get_date;

      return view('user_profile.my_course', $data);
    }


    public function del_wishlist(Request $request){
      $id = $request['id'];

      DB::table('wishlists')
        ->where('id', $id)
        ->delete();

        return response()->json([
          'status' => 1001
        ]);

    }


    public function add_wishlist(Request $request){

      $id = $request['id'];
      $user_id = Auth::user()->id;


      $check = DB::table('wishlists')
        ->where('user_id', $user_id)
        ->where('course_id', $id)
        ->count();

        if($check > 0){

          return response()->json([
            'status' => 1000
          ]);

        }else{

          $package = new wishlist();
          $package->user_id = Auth::user()->id;
          $package->course_id = $id;
          $package->save();

          return response()->json([
            'status' => 1001
          ]);

        }


    }


    public function index()
    {
      $objs = DB::table('users')
          ->select(
          'users.*',
          'levels.*',
          'levels.id as level_user'
          )
          ->leftjoin('levels', 'levels.points', '>=', 'users.point_level')
          ->where('users.id', Auth::user()->id)
          ->first();
        //  dd($objs);
      $data['objs'] = $objs;
      $data['method'] = "put";
      return view('user_profile.edit_profile', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
     {
       $image = $request->file('image');


      if($image == NULL){

        $this->validate($request, [
             'nickname' => 'required',
             'email' => 'required',
             'address' => 'required',
             'phone' => 'required',
             'line_id' => 'required',
         ]);

         $package = users::find($id);
         $package->name = $request['nickname'];
         $package->email = $request['email'];
         $package->hbd = $request['hbd'];
         $package->phone = $request['phone'];
         $package->address = $request['address'];
         $package->line_id = $request['line_id'];
         $package->bio = $request['bio'];
         $package->save();

       return redirect(url('profile'))->with('success','แก้ไขข้อมูลส่วนตัวสำเร็จ');

       }else{

         $this->validate($request, [
              'image' => 'required|mimes:jpg,jpeg,png,gif|max:10048',
              'nickname' => 'required',
              'hbd' => 'required',
              'address' => 'required',
              'phone' => 'required',
              'line_id' => 'required',
          ]);

          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

           $destinationPath = asset('assets/images/avatar');
           $img = Image::make($image->getRealPath());
           $img->resize(400, null, function ($constraint) {
           $constraint->aspectRatio();
         })->save('assets/images/avatar/'.$input['imagename'], 50);

          $package = users::find($id);
          $package->avatar = $input['imagename'];
          $package->name = $request['nickname'];
          $package->hbd = $request['hbd'];
          $package->phone = $request['phone'];
          $package->address = $request['address'];
          $package->line_id = $request['line_id'];
          $package->bio = $request['bio'];
          $package->save();
          return redirect(url('profile'))->with('success','แก้ไขข้อมูลส่วนตัวสำเร็จ');
       }
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
