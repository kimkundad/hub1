<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Users;
use App\department;
use App\teacher;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['course_message'] = 0;
      $data['count_message'] = 0;
        //
        $objs = DB::table('teachers')
            ->get();

        $data['objs'] = $objs;
        $data['datahead'] = "รายชื่อครูผู้สอนทั้งหมด";
        return view('admin.teacher.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $depart = department::all();
        $data['depart'] = $depart;
        $data['course_message'] = 0;
        $data['count_message'] = 0;
        $data['method'] = "post";
        $data['url'] = url('admin/teachers');
        $data['header'] = "เพิ่มครูผู้สอน";
        return view('admin.teacher.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      $image = $request->file('image');


      $this->validate($request, [
       'image' => 'required|mimes:jpg,jpeg,png,gif|max:8048',
       'te_name' => 'required',
       'depart_id' => 'required'

      ]);


     $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

      $destinationPath = asset('assets/images/teachers');
      $img = Image::make($image->getRealPath());
      $img->resize(370, 493, function ($constraint) {
      $constraint->aspectRatio();
    })->save('assets/images/teachers/'.$input['imagename']);


     $package = new teacher();
     $package->te_image = $input['imagename'];
     $package->te_name = $request['te_name'];
     $package->depart_id = $request['depart_id'];
     $package->te_old = $request['te_old'];
     $package->te_phone = $request['te_phone'];
     $package->te_email = $request['te_email'];
     $package->te_about = $request['te_about'];
     $package->te_exper = $request['te_exper'];
     $package->te_edu = $request['te_edu'];
     $package->te_facebook = $request['te_facebook'];
     $package->te_twitter = $request['te_twitter'];
     $package->te_ig = $request['te_ig'];
     $package->save();

   return redirect(url('admin/teachers'))->with('success','เพิ่มบัญชีผู้ใช้งาน '.$request['name'].' เสร็จเรียบร้อยแล้ว');
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

        $depart = department::all();
        $data['depart'] = $depart;

        $obj = DB::table('teachers')
          ->where('id', $id)
          ->first();

          $data['course_message'] = 0;
          $data['count_message'] = 0;

        $data['url'] = url('admin/teachers/'.$id);
        $data['header'] = "แก้ไขบัญชีผู้ใช้งาน";
        $data['method'] = "put";

        $data['objs'] = $obj;
        return view('admin.teacher.edit', $data);
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


      $this->validate($request, [
       'te_name' => 'required',
       'depart_id' => 'required'

      ]);


     if($image == NULL){

        $package = teacher::find($id);
        $package->te_name = $request['te_name'];
        $package->depart_id = $request['depart_id'];
        $package->te_old = $request['te_old'];
        $package->te_phone = $request['te_phone'];
        $package->te_email = $request['te_email'];
        $package->te_about = $request['te_about'];
        $package->te_exper = $request['te_exper'];
        $package->te_edu = $request['te_edu'];
        $package->te_facebook = $request['te_facebook'];
        $package->te_twitter = $request['te_twitter'];
        $package->te_ig = $request['te_ig'];
        $package->save();

      return redirect(url('admin/teachers/'.$id.'/edit'))->with('success','Edit '.$request['name'].' successful');

      }else{


         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $destinationPath = asset('assets/images/teachers');
          $img = Image::make($image->getRealPath());
          $img->resize(370, 493, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/images/teachers/'.$input['imagename']);

         $package = teacher::find($id);
         $package->te_image = $input['imagename'];
         $package->te_name = $request['te_name'];
         $package->depart_id = $request['depart_id'];
         $package->te_old = $request['te_old'];
         $package->te_phone = $request['te_phone'];
         $package->te_email = $request['te_email'];
         $package->te_about = $request['te_about'];
         $package->te_exper = $request['te_exper'];
         $package->te_edu = $request['te_edu'];
         $package->te_facebook = $request['te_facebook'];
         $package->te_twitter = $request['te_twitter'];
         $package->te_ig = $request['te_ig'];
         $package->save();

         return redirect(url('admin/teachers/'.$id.'/edit'))->with('success','Edit '.$request['name'].' successful');
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

        $obj = teacher::find($id);
        $obj->delete();
        return redirect(url('admin/teachers'))->with('delete','Delete successful');
    }
}
