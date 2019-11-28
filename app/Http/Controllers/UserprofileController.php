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



                  if(isset($get_friend)){
                    foreach($get_friend as $u){



                      $get_data_user = DB::table('submitcourses')
                          ->where('user_id', $u->id)
                          ->where('status', 2)
                          ->count();

                          if($get_data_user > 0){
                            $u->get_data_refer = 1;
                          }else{
                            $u->get_data_refer = 0;
                          }

                    }
                  }



          }else{

            $objs1 = DB::table('users')
                ->where('users.id', Auth::user()->id)
                ->first();


                $get_friend = DB::table('users')
                    ->where('refer_code', $objs1->code_user)
                    ->get();

                    if(isset($get_friend)){
                      foreach($get_friend as $u){



                        $get_data_user = DB::table('submitcourses')
                            ->where('user_id', $u->id)
                            ->where('status', 2)
                            ->count();

                            if($get_data_user > 0){
                              $u->get_data_refer = 1;
                            }else{
                              $u->get_data_refer = 0;
                            }

                      }
                    }


          }


        //  dd($get_friend);


      $data['get_friend'] = $get_friend;
      $data['objs'] = $objs1;
      return view('user_profile.my_friends', $data);
    }


    public function my_course_video($id){


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


          return view('user_profile.my_course_video', $data);

    }


    public function my_package(){

      $objs = DB::table('submitcourses')
        ->select(
           'submitcourses.*',
           'submitcourses.user_id as Uid',
           'submitcourses.id as Oid',
           'submitcourses.created_at as created_ats',
           'courses.*',
           'courses.id as id_c'
           )
        ->where('submitcourses.user_id', Auth::user()->id)
        ->where('submitcourses.status', 2)
        ->leftjoin('courses', 'courses.id', '=', 'submitcourses.course_id')
        ->get();

        $data['objs'] = $objs;

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
        'departments.*'
        )
        ->leftjoin('examples', 'examples.id', '=', 'answers.examples_id')
        ->leftjoin('courses', 'courses.id', '=', 'examples.course_id')
        ->leftjoin('departments', 'departments.id', '=', 'examples.category_id')
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

      $pack = DB::table('submitcourses')
        ->select(
           'submitcourses.*',
           'submitcourses.user_id as Uid',
           'submitcourses.id as Oid',
           'submitcourses.status as status_sub',
           'submitcourses.created_at as created_ats',
           'users.*',
           'courses.*'
           )
        ->where('submitcourses.user_id', Auth::user()->id)
        ->leftjoin('users', 'users.id', '=', 'submitcourses.user_id')
        ->leftjoin('courses', 'courses.id', '=', 'submitcourses.course_id')
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
