<div style="font-family:verdana;font-size:12px;color:#555555;line-height:14pt">
<div style="width:590px">
<div style="background:url('{{url('assets/image/email_top.png')}}') no-repeat;width:100%;height:75px;display:block">
<div style="padding-top:30px;padding-left:50px;padding-right:50px">
<a href="#" target="_blank" ><img src="{{url('home/images/logo_v2.png')}}" alt=""
  style="border:none; height:42px;" ></a>
</div>
</div>
<div style="background:url('{{url('assets/image/email_mid.png')}}')
repeat-y;width:100%;display:block">
<div style="padding-left:50px;padding-right:50px;padding-bottom:1px">
<div style="border-bottom:1px solid #ededed"></div>
<div style="margin:20px 0px;font-size:30px;line-height:30px;text-align:left">ขอขอบคุณ</div>
<div style="margin-bottom:30px">
<div>คุณสั่งซื้อ {{$data->title_course}}</div>
<br>
<div style="margin-bottom:20px;text-align:left">
  <b>หมายเลขคำสั่งซื้อ:</b> {{$data->order_id}}<br>
  <b>วันที่สั่งซื้อ:</b> {{$datatime}}</div>
</div>
<div>
<div>
</div>
<span></span>
<table style="width:100%;margin:5px 0">
<tbody>
<tr>
<td style="text-align:left;font-weight:bold;font-size:12px">รายการ</td>
<td style="text-align:right;font-weight:bold;font-size:12px" width="70">ราคา</td>
</tr>
</tbody>
</table>
<div style="border-bottom:1px solid #ededed"></div>
<table style="width:100%;margin:5px 0">
<tbody>
<tr>
</tr>
    <tr>
      <td style="text-align:left;font-size:12px;padding-right:10px">
        <span>{{$data->title_course}}</span>
      </td>
      <td style="text-align:right;font-size:12px">
        <span>THB{{$data->price_course}}</span>
        <span></span>
      </td>
    </tr>
</tbody>
</table>
<div style="border-bottom:1px solid #ededed">
</div>
<table style="width:100%;margin:5px 0">
<tbody>
<tr>
<td style="text-align:right;font-size:12px" width="150">
ภาษี: <span>THB0.00</span>
</td>
</tr>
<tr>
<td style="text-align:right;font-size:12px" width="150">
<span>ส่วนลด: </span>THB{{$data->discount_price}}.00
</td>
</tr>
<tr>
<td style="text-align:right;font-size:12px" width="150">
@if($data->price_course-$data->discount_price < 0)
<span>รวม: </span>THB 0.00
@else
<span>รวม: </span>THB{{$data->price_course-$data->discount_price}}.00
@endif

</td>
</tr>
</tbody>
</table>
<div style="border-bottom:1px solid #ededed"></div>





</div><div style="margin:20px 0">หากมีคำถาม ติดต่อ <a href="#" target="_blank" >02 658 3819</a>
</div><div style="border-bottom:1px solid #ededed"></div>
<div style="margin:10px 5px;display:inline-block">
<table>
<tbody>
<tr>
<td style="vertical-align:top">
<div style="margin-right:8px;margin-top:3px">
<img src="{{url('home/images/logo_v2.png')}}" style="border:none; height:50px;" class="CToWUd">
</div>
</td>
<td style="vertical-align:top;font-size:12px;color:#555555;line-height:16px">
<div style="font-size:14px;font-weight:bold;margin-bottom:8px">hubjung</div>
<div style="margin-bottom:8px">สถาบันออนไลน์ สำหรับคนที่ต้องการความก้าวหน้า สอนโดยผู้เชี่ยวชาญ จากประสบการณ์จริง <a href="#" target="_blank" >
เรียนรู้เพิ่มเติม</a><a href="#" style="font-family:'Droid Sans',Arial,sans-serif;color:#4db8ca;font-size:150%;
text-decoration:none;padding-left:4px;line-height:12px" target="_blank" >›</a>
</div></td></tr>
</tbody>
</table>
</div>
<div style="border-bottom:1px solid #ededed">
</div>

<div style="margin:20px 0 40px 0;font-size:10px;color:#707070">
ดู<a href="#" target="_blank">ประวัติการสั่งซื้อ</a>
บน hubjung ข้อมูลส่วนตัวของคุณ<br>
ดู<a href="#" target="_blank" >นโยบายการคืนเงิน</a>ของ hubjung และ<a href="#" target="_blank">ข้อกำหนดในการให้บริการ</a>
</div>
<div style="font-size:9px;color:#707070">

<br>© 2017 hubjung | สงวนลิขสิทธิ์<br>hubjung 458/4 Siamsquare Soi 8 4th Floor, Pathumwan, Bangkok 10330</div>
</div></div>
<div class="yj6qo"></div>
<div style="background:url('{{url('assets/image/email_bottom.png')}}') no-repeat;width:100%;height:50px;display:block"></div></div></div>
