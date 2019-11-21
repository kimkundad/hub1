<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\user_payment;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Redirect;

class UserpayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $bank = DB::table('banks')
          ->get();

          $data['bank'] = $bank;


        $cat = DB::table('user_payments')->select(
            'user_payments.*',
            'user_payments.id as ids',
            'banks.*'
            )
            ->leftjoin('banks', 'banks.id',  'user_payments.bank')
            ->get();

            //dd($cat);

            $data['objs'] = $cat;
            $data['datahead'] = "แจ้งการชำระเงิน";
            return view('admin.get_pay_info.index', $data);
    }



    public function api_pay_status(Request $request){

    $user = user_payment::findOrFail($request->user_id);

              if($user->pay_status == 1){
                  $user->pay_status = 0;
              } else {
                  $user->pay_status = 1;
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
        //
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
