<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\department;
use App\sub_departments;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class SubDeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $objs = DB::table('sub_departments')
          ->select(
          'sub_departments.*',
          'sub_departments.id as id_de',
          'sub_departments.created_at as created_ats',
          'sub_departments.de_status as de_status_2',
          'departments.*'
          )
          ->leftjoin('departments', 'departments.id',  'sub_departments.id_depart')
          ->paginate(15);


        $data['course_message'] = 0;
        $data['count_message'] = 0;
        //$objs = sub_departments::all();
        $data['objs'] = $objs;
        $data['datahead'] = "หมวดหมู่ภาควิชา";
        return view('admin.sub_department.index', $data);
    }



    public function api_subdepart_status(Request $request){

    $user = sub_departments::findOrFail($request->user_id);

              if($user->de_status == 1){
                  $user->de_status = 0;
              } else {
                  $user->de_status = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);

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
        $data['url'] = url('admin/sub_department');
        $data['header'] = "เพิ่มหมวดหมู่ย่อย";
        return view('admin.sub_department.create', $data);
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

        $this->validate($request, [
         'image' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
         'name_sub_depart' => 'required',
         'id_depart' => 'required'
       ]);

       $image = $request->file('image');
       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = asset('assets/images/sub_de');
        $img = Image::make($image->getRealPath());
        $img->resize(1920, 450, function ($constraint) {
        $constraint->aspectRatio();
      })->save('assets/images/sub_de/'.$input['imagename']);

       $package = new sub_departments();
       $package->image_sub_depart = $input['imagename'];
       $package->id_depart = $request['id_depart'];
       $package->name_sub_depart = $request['name_sub_depart'];
       $package->sub_depart_sort = $request['sub_depart_sort'];
       $package->save();

       return redirect(url('admin/sub_department'))->with('success','เพิ่มธนาคาร '.$request['bank_name'].' เสร็จเรียบร้อยแล้ว');
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
        $data['course_message'] = 0;
        $data['count_message'] = 0;
        $obj = sub_departments::find($id);
        $data['url'] = url('admin/sub_department/'.$id);
        $data['header'] = "แก้ไขหมวดหมู่ย่อย";
        $data['method'] = "put";
        $data['objs'] = $obj;
        return view('admin.sub_department.edit', $data);
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
        //

        $image = $request->file('image');

        if($image == null){
          $package = sub_departments::find($id);
          $package->id_depart = $request['id_depart'];
          $package->name_sub_depart = $request['name_sub_depart'];
          $package->sub_depart_sort = $request['sub_depart_sort'];
          $package->save();
        }else{

          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

           $destinationPath = asset('assets/images/sub_de');
           $img = Image::make($image->getRealPath());
           $img->resize(1920, 450, function ($constraint) {
           $constraint->aspectRatio();
         })->save('assets/images/sub_de/'.$input['imagename']);


          $package = sub_departments::find($id);
          $package->image_sub_depart = $input['imagename'];
          $package->id_depart = $request['id_depart'];
          $package->name_sub_depart = $request['name_sub_depart'];
          $package->sub_depart_sort = $request['sub_depart_sort'];
          $package->save();
        }



        return redirect(url('admin/sub_department'))->with('success','Edit successful');
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
        $obj = sub_departments::find($id);
        $obj->delete();
        return redirect(url('admin/sub_department'))->with('delete','Delete successful');
    }
}
