<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\course;
use App\typecourses;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Excel;
use File;
use App\users;
use App\submitcourse;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;

class Course_studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $course_message = DB::table('submitcourses')
        ->select(
           'submitcourses.*',
           'submitcourses.user_id as Uid',
           'submitcourses.id as Oid',
           'submitcourses.created_at as Dcre',
           'users.*',
           'users.id as Ustudent',
           'courses.*',
           'banks.*',
           'courses.id as Ucourse'
           )
        ->leftjoin('users', 'users.id', '=', 'submitcourses.user_id')
        ->leftjoin('courses', 'courses.id', '=', 'submitcourses.course_id')
        ->leftjoin('banks', 'banks.id', '=', 'submitcourses.bank_id')
        ->count();




      $coursess = DB::table('submitcourses')
        ->select(
           'submitcourses.*',
           'submitcourses.user_id as Uid',
           'submitcourses.id as Oid',
           'submitcourses.created_at as Dcre',
           'users.*',
           'users.id as Ustudent',
           'courses.*',
           'banks.*',
           'courses.id as Ucourse'
           )
        ->leftjoin('users', 'users.id', '=', 'submitcourses.user_id')
        ->leftjoin('courses', 'courses.id', '=', 'submitcourses.course_id')
        ->leftjoin('banks', 'banks.id', '=', 'submitcourses.bank_id')
        ->Orderby('submitcourses.id', 'desc')
        ->paginate(15);

      $data['objs'] = $coursess;
      $data['datahead'] = "รายการสั่งซื้อทั้งหมด";
      return view('admin.student_c.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function search_ordersubmit(Request $request){




     $search_text = $request['q'];


     $cat = DB::table('submitcourses')
       ->select(
          'submitcourses.*',
          'submitcourses.user_id as Uid',
          'submitcourses.id as Oid',
          'submitcourses.created_at as Dcre',
          'users.*',
          'users.id as Ustudent',
          'courses.*',
          'banks.*',
          'courses.id as Ucourse'
          )
       ->leftjoin('users', 'users.id', '=', 'submitcourses.user_id')
       ->leftjoin('courses', 'courses.id', '=', 'submitcourses.course_id')
       ->leftjoin('banks', 'banks.id', '=', 'submitcourses.bank_id')
       ->where('submitcourses.status', '>', 0)
       ->Where('users.name','LIKE','%'.$search_text.'%')
       ->orWhere('submitcourses.order_id','LIKE','%'.$search_text.'%')
       ->orWhere('courses.title_course','LIKE','%'.$search_text.'%')
       ->orderBy('submitcourses.id', 'desc')
       ->paginate(15);



       $data['objs'] = $cat;
       $data['search_text'] = $search_text;

       return view('admin.student_c.search', $data);

       /*return view('admin.student_c.search', compact(['objs']))
             ->with('count_message', $s)
             ->with('message_user', $message_user)
             ->with('search_text', $search_text); */


    }



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
      $course_message = DB::table('submitcourses')
        ->select(
           'submitcourses.*',
           'submitcourses.user_id as Uid',
           'submitcourses.id as Oid',
           'submitcourses.created_at as Dcre',
           'users.*',
           'users.id as Ustudent',
           'courses.*',
           'banks.*',
           'courses.id as Ucourse'
           )
        ->where('submitcourses.id', $id)
        ->leftjoin('users', 'users.id', '=', 'submitcourses.user_id')
        ->leftjoin('courses', 'courses.id', '=', 'submitcourses.course_id')
        ->leftjoin('banks', 'banks.id', '=', 'submitcourses.bank_id')
        ->count();

      //  dd($course_message);

      if($course_message > 0){

        $coursess = DB::table('submitcourses')
          ->select(
             'submitcourses.*',
             'submitcourses.user_id as Uid',
             'submitcourses.id as Oid',
             'submitcourses.created_at as Dcre',
             'users.*',
             'users.id as Ustudent',
             'courses.*',
             'banks.*',
             'courses.id as Ucourse'
             )
          ->where('submitcourses.id', $id)
          ->leftjoin('users', 'users.id', '=', 'submitcourses.user_id')
          ->leftjoin('courses', 'courses.id', '=', 'submitcourses.course_id')
          ->leftjoin('banks', 'banks.id', '=', 'submitcourses.bank_id')
          ->first();



      }else{


        $coursess = DB::table('submitcourses')
          ->select(
             'submitcourses.*',
             'submitcourses.user_id as Uid',
             'submitcourses.id as Oid',
             'submitcourses.created_at as Dcre',
             'users.*',
             'users.id as Ustudent',
             'courses.*',
             'banks.*',
             'courses.id as Ucourse'
             )
          ->where('submitcourses.order_id', $id)
          ->leftjoin('users', 'users.id', '=', 'submitcourses.user_id')
          ->leftjoin('courses', 'courses.id', '=', 'submitcourses.course_id')
          ->leftjoin('banks', 'banks.id', '=', 'submitcourses.bank_id')
          ->first();




      }

    //  $data['course_message'] = $course_message;







        $pay = DB::table('user_payments')->select(
            'user_payments.*',
            'user_payments.id as ids',
            'banks.*'
            )
            ->leftjoin('banks', 'banks.id',  'user_payments.bank')
            ->where('user_payments.order_id', $coursess->order_id)
            ->first();


    //  dd($pay);

      $data['pay'] = $pay;

      //dd($coursess);
      $data['method'] = "put";
      $data['url'] = url('admin/play_student/'.$id);
      $data['courseinfo'] = $coursess;
      $data['datahead'] = "จัดการคอร์สเรียน";
      return view('admin.student_c.edit', $data);
    }





    public function print($id){


      $coursess = DB::table('submitcourses')
        ->select(
           'submitcourses.*',
           'submitcourses.user_id as Uid',
           'submitcourses.id as Oid',
           'submitcourses.created_at as Dcre',
           'users.*',
           'users.id as Ustudent',
           'courses.*',
           'banks.*',
           'courses.id as Ucourse'
           )
        ->where('submitcourses.id', $id)
        ->leftjoin('users', 'users.id', '=', 'submitcourses.user_id')
        ->leftjoin('courses', 'courses.id', '=', 'submitcourses.course_id')
        ->leftjoin('banks', 'banks.id', '=', 'submitcourses.bank_id')
        ->first();



      $data['courseinfo'] = $coursess;
      $data['datahead'] = "จัดการคอร์สเรียน";
      return view('admin.student_c.print', $data);

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
      $this->validate($request, [
   'status' => 'required'
    ]);


    $status_check = $request['status'];


    $upobj = DB::table('submitcourses')
        ->select(
        'submitcourses.*'
        )
        ->where('id', $id)
        ->update(array(
          'status' => $request['status']
        ));


        if($status_check == 2){


          DB::table('coupon_users')
              ->select(
              'coupon_users.*'
              )
              ->where('order_id', $id)
              ->update(array(
                'coupon_status' => 1
              ));

        }


        $status_user = $request->get('status');


        if($status_user == 2){


          $coursess = DB::table('submitcourses')
            ->select(
               'submitcourses.*',
               'submitcourses.user_id as Uid',
               'submitcourses.id as Oid',
               'users.*',
               'banks.*',
               'courses.*'
               )
            ->where('submitcourses.id', $id)
            ->leftjoin('users', 'users.id', '=', 'submitcourses.user_id')
            ->leftjoin('courses', 'courses.id', '=', 'submitcourses.course_id')
            ->leftjoin('banks', 'banks.id', '=', 'submitcourses.bank_id')
            ->first();




       }

       return redirect(url('admin/play_student/'.$id.'/edit'))->with('edit_order','แก้ไขข้อมูล สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $check_poupon = DB::table('coupon_users')
       ->where('order_id', $id)
       ->count();

       if($check_poupon > 0){
         DB::table('coupon_users')
         ->where('order_id', $id)
         ->delete();
       }


      $obj = DB::table('submitcourses')
      ->where('submitcourses.id', $id)
      ->delete();



      return redirect(url('admin/play_student/'))->with('delete','ลบข้อมูล สำเร็จ');
    }
}
