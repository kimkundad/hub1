<?php

use Illuminate\Support\Facades\DB;


function get_menu(){

  $menu_web = DB::table('departments')
          ->get();

          foreach($menu_web as $u){

            $check_count = DB::table('sub_departments')
                ->where('id_depart', $u->id)
                ->count();

            $options = DB::table('sub_departments')
                ->where('id_depart', $u->id)
                ->get();

                if($check_count > 0){
                  foreach($options as $j){
                    $u->options = $options;
                  }
                }else{
                  $u->options = null;
                }


          }



      return $menu_web;
}


function DateThai($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];

return "$strDay $strMonthThai $strYear";
}
