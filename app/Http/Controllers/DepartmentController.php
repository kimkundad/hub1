<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\department;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class DepartmentController extends Controller
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

      $objs = department::all();

      if(isset($objs)){
        foreach($objs as $u){

          $count = DB::table('sub_departments')
           ->where('id_depart', $u->id)
           ->count();

           $u->count = $count;

        }
      }

      $data['objs'] = $objs;
      $data['datahead'] = "หมวดหมู่ภาควิชา";
      return view('admin.department.index', $data);
    }



    public function api_depart_status(Request $request){

    //  dd($request->user_id);

    $user = department::findOrFail($request->user_id);

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
      $data['course_message'] = 0;
      $data['count_message'] = 0;
      $data['method'] = "post";
      $data['url'] = url('admin/department');
      $data['header'] = "เพิ่มหมวดหมู่หลัก";
      return view('admin.department.create', $data);
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

      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

      $destinationPath = asset('assets/image/department/');
      $img = Image::make($image->getRealPath());
      $img->resize(370, 247, function ($constraint) {
      $constraint->aspectRatio();
      })->save('assets/image/department/'.$input['imagename']);


      $package = new department();
      $package->name_department = $request['name_department'];
      $package->detail_depart = $request['detail_depart'];
      $package->image = $input['imagename'];
      $package->depart_sort = $request['depart_sort'];
      $package->icon_de = $request['icon_de'];
      $package->save();
      return redirect(url('admin/department'))->with('success','เพิ่ม'.$request['name_department'].' เสร็จเรียบร้อยแล้ว');
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
      $data['course_message'] = 0;
      $data['count_message'] = 0;

      $obj = department::find($id);
      $data['url'] = url('admin/department/'.$id);
      $data['header'] = "แก้ไขหมวดหมู่หลัก";
      $data['method'] = "put";
      $data['objs'] = $obj;
      return view('admin.department.edit', $data);
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

       if($image == null){
         $package = department::find($id);
         $package->name_department = $request['name_department'];
         $package->detail_depart = $request['detail_depart'];
         $package->depart_sort = $request['depart_sort'];
         $package->icon_de = $request['icon_de'];
         $package->save();
       }else{

         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

         $destinationPath = asset('assets/image/department/');
         $img = Image::make($image->getRealPath());
         $img->resize(370, 247, function ($constraint) {
         $constraint->aspectRatio();
         })->save('assets/image/department/'.$input['imagename']);


         $package = department::find($id);
         $package->name_department = $request['name_department'];
         $package->detail_depart = $request['detail_depart'];
         $package->image = $input['imagename'];
         $package->depart_sort = $request['depart_sort'];
         $package->icon_de = $request['icon_de'];
         $package->save();
       }



       return redirect(url('admin/department'))->with('success','Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $obj = department::find($id);
      $obj->delete();
      return redirect(url('admin/department'))->with('delete','Delete successful');
    }
}
