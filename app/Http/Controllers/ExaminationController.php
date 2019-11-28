<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\example;
use App\answer;
use App\setpoint;
use App\User;
use Illuminate\Support\Facades\DB;

class ExaminationController extends Controller
{
    //

    public function index(){


      $objs = DB::table('examples')
          ->select(
          'examples.*',
          'examples.id as e_id',
          'courses.*',
          'courses.id as c_id',
          'categories.*'
          )
          ->leftjoin('courses', 'examples.course_id', '=', 'courses.id')
          ->leftjoin('categories', 'examples.category_id', '=', 'categories.id')
          ->paginate(20);


          foreach ($objs as $obj) {

              $options = DB::table('questions')->where('category_id',$obj->e_id)->count();
              $obj->options = $options;
          }

          //dd($objs);
          $data['objs'] = $objs;
          $data['datahead'] = "แบบฝึกหัดทั้งหมด";
          return view('examination', $data);


    }


    public function success_ans_package2($id){

      $course_tech = DB::table('questions')->select(
        'questions.*',
        'answers.question_id',
        'answers.answers',
        'answers.ans_status'
        )
        ->leftjoin('answers', 'questions.id_questions', '=', 'answers.question_id')
        ->where('answers.id_option',$id)
        ->get();


        $course_tech_get = DB::table('questions')->select(
          'questions.*',
          'answers.question_id',
          'answers.answers',
          'answers.time_ans',
          'answers.ans_status'
          )
          ->leftjoin('answers', 'questions.id_questions', '=', 'answers.question_id')
          ->where('answers.id_option',$id)
          ->first();




          $total = DB::table('questions')->select(
            'questions.*',
            'answers.question_id',
            'answers.answers',
            'answers.ans_status'
            )
            ->leftjoin('answers', 'questions.id_questions', '=', 'answers.question_id')
            ->where('answers.id_option',$id)
            ->sum('questions.point');

        //    dd($total);

        $course_detail = DB::table('examples')->select(
          'examples.*',
          'examples.id as Eid',
          'examples.created_at as created_at_date',
          'categories.id as Cid',
          'categories.*'
          )
          ->leftjoin('categories', 'categories.id', '=', 'examples.category_id')
          ->where('examples.id',$course_tech_get->category_id)
          ->first();


          $depart = DB::table('courses')
            ->where('id', $course_detail->course_id)
            ->first();





          $course_tech_count = DB::table('answers')->select(
            'answers.*'
            )
            ->where('answers.user_id', Auth::user()->id)
            ->where('answers.examples_id', $course_tech_get->category_id)
            ->where('answers.ans_status', 1)
            ->where('answers.id_option',$id)
            ->count();


            $course_tech_count_all = DB::table('answers')->select(
              'answers.*'
              )
              ->where('answers.user_id', Auth::user()->id)
              ->where('answers.examples_id', $course_tech_get->category_id)
              ->where('answers.id_option',$id)
              ->count();

              $sum = 0;

        foreach ($course_tech as $obj) {
            $optionsRes = [];
            $options = DB::table('options')->select(
              'options.*'
              )
              ->where('options.question_id', $obj->id_questions)
              ->get();
              $sum++;
            $obj->options = $options;

        }


        $objs = DB::table('users')
            ->select(
            'users.*',
            'levels.*',
            'levels.id as level_user'
            )
            ->leftjoin('levels', 'levels.points', '>=', 'users.point_level')
            ->where('users.id', Auth::user()->id)
            ->first();
            $s =0;


            return view('success_ans_package2')->with([
                 'course_detail' =>$course_detail,
                 'course_tech' =>$course_tech,
                 'course_tech_get' =>$course_tech_get,
                 'objs' => $objs,
                 's' => $s,
                 'depart' => $depart,
                 'sum' => $sum,
                 'course_tech_count' => $course_tech_count,
                 'course_tech_count_all' => $course_tech_count_all,
                 'total' => $total
               ]);

    }

    public function post_ans_course2(Request $request){


      $examples_id = $request['examples_id'];



      $examples_type = $request['examples_type'];
      $cat_id = $request['cat_id'];

      $course_tech = DB::table('questions')->select(
        'questions.*'
        )
        ->where('questions.category_id',$examples_id)
        ->get();

        $course_tech_count = DB::table('questions')->select(
          'questions.*'
          )
          ->where('questions.category_id',$examples_id)
          ->count();

        //  dd($course_tech_count);

        $s_data = 1;


      $ranId = rand(100000,999999);
      while (true) {
        $dupId = answer::where('id_option', $ranId)->first();
        if (isset($dupId)) {
            $ranId = rand(100000,999999);
        }
        else {
          break;
        }
      }
      $num = 'learnsbuy-'.$ranId;


      if($course_tech){
      foreach($course_tech as $payment){

        $value = $request['value_'.$s_data];
        $id_questions = $payment->id_questions;



          if($payment->status == $value && $examples_type == 2){
            $payment = new answer();
            $payment->examples_id  = $examples_id;
            $payment->user_id = Auth::user()->id;
            $payment->question_id = $id_questions;
            $payment->id_option = $num;
            $payment->answers = $value;
            $payment->ans_status = 1;
            $payment->time_ans = $request['timmery_time'];
            $payment->save();

            $the_id = $payment->id_option;
          }else{
            $payment = new answer();
            $payment->examples_id  = $examples_id;
            $payment->user_id = Auth::user()->id;
            $payment->question_id = $id_questions;
            $payment->id_option = $num;
            $payment->answers = $value;
            $payment->ans_status = 0;
            $payment->time_ans = $request['timmery_time'];
            $payment->save();

            $the_id = $payment->id_option;
          }

          //echo 'value_'.$payment->id_questions;
          //dd('value_'.$payment->id_questions);
          //dd($payment);
          $s_data++;
            }
        }


        $course_chart7 = DB::table('answers')->select(
          DB::raw(' max(answers.id_option) as id_optionss'),
          'answers.*',
          'examples.*',
          'categories.*'
          )
          ->leftjoin('examples', 'examples.id', '=', 'answers.examples_id')
          ->leftjoin('categories', 'categories.id', '=', 'examples.category_id')
          ->where('answers.user_id', Auth::user()->id)
          ->where('examples.id', $examples_id)
          ->where('categories.id', $cat_id)
          ->orderBy('answers.id_option', 'desc')
          ->groupBy('answers.id_option')
          ->sum('ans_status');

          $options = DB::table('questions')->select(
            'questions.*'
            )
            ->where('questions.category_id', $examples_id)
            ->count();


          if($course_chart7 == 0 || $course_chart7 == null){
            $course_chart7 = 0;
          }else{
            $course_chart7_sum = $course_chart7;

            $course_chart7 = ($course_chart7/$options*100);

            $course_chart7 = ($course_chart7/2);
          }

          $obj = User::find(Auth::user()->id);
          $obj->point_level += $course_chart7;
          $obj->save();



        $course_tech = DB::table('answers')->select(
          'answers.*'
          )
          ->where('answers.user_id', Auth::user()->id)
          ->where('answers.examples_id', $examples_id)
          ->where('answers.ans_status', 1)
          ->count();

        return redirect(url('success_ans_package2/'.$the_id))->with('success','ยินดีด้วย');

    }



    public function examination_test($id){


      $package = example::find($id);
      $package->view += 1;
      $package->save();

      $course_detail = DB::table('examples')->select(
        'examples.*',
        'examples.created_at as created_at_date',
        'examples.id as Eid',
        'departments.*',
        'departments.id as cat_id'
        )
        ->leftjoin('departments', 'departments.id', '=', 'examples.category_id')
        ->where('examples.id', $id)
        ->first();

        $get_course= DB::table('courses')
          ->where('id',$course_detail->course_id)
          ->first();

          $data['get_course'] = $get_course;

        $course_tech = DB::table('questions')->select(
          'questions.*'
          )
          ->where('questions.category_id',$id)
          ->get();

          $sum = 1;

          foreach ($course_tech as $obj) {
              $optionsRes = [];
              $options = DB::table('options')->select(
                'options.*'
                )
                ->where('options.question_id', $obj->id_questions)
                ->get();
                $sum++;
              $obj->options = $options;

          }

        //  dd($course_tech);

        $s = 1;
        $set = 1;
        $data['objs'] = $course_detail;
        $data['course_tech'] = $course_tech;
        $data['s'] = $s;
        $data['set'] = $set;
        $data['sum'] = $sum;
        $data['id'] = $course_detail->cat_id;
          return view('examination_test', $data);


    }

    public function examination_list($id){

      $objs = DB::table('examples')
          ->select(
          'examples.*',
          'examples.id as e_id',
          'courses.*',
          'courses.id as c_id',
          'departments.*'
          )
          ->leftjoin('courses', 'examples.course_id', '=', 'courses.id')
          ->leftjoin('departments', 'examples.category_id', '=', 'departments.id')
          ->where('examples.category_id', $id)
          ->paginate(20);


          foreach ($objs as $obj) {

              $options = DB::table('questions')->where('category_id',$obj->e_id)->count();
              $obj->options = $options;
          }

          //dd($objs);
          $data['objs'] = $objs;
          $data['id'] = $id;

          $data['datahead'] = "แบบฝึกหัดทั้งหมด";
          return view('examination_list', $data);

    }
}
