@extends('layouts.template')
@section('stylesheet')

<style>
.breadcrumb-area {
    background-image: url('{{url('assets/home/1920_450.png')}}');
}
</style>

@stop('stylesheet')
@section('content')




<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area" style="background-image: url({{url('assets/images/breadcrumb-bg.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">

                    <h2 class="breadcrumb__title">คำถาม? ที่มักพบบ่อย</h2>
                  <div class="text-outline">Faqs</div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->


<!-- ================================
       START FAQ AREA
================================= -->
<section class="faq-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="faq-body">

                    <div class="faq-panel">
                        <div class="faq-heading">
                            <h4 class="faq__title">Hubjung คือใคร?<i class="fa fa-angle-right"></i></h4>
                        </div><!-- end accordion__title -->
                        <div class="faq-content">
                            <p class="faq__desc">
                                เป็นเว็บไซต์คอร์สออนไลน์อันดับหนึ่งของไทย เราเชิญผู้ที่มีความรู้และมีความสามารถมาสอนในรูปแบบวิดีโอ
                                และนำวิดีโอเหล่านั้นมาลงที่เว็บไซต์ Hubjung เพื่อผู้เรียนสามารถเรียนจากที่ไหนก็ได้ เมื่อไรก็ได้ ผ่านเว็บไซต์ Hubjung
                            </p>
                        </div><!-- end faq-content -->
                    </div><!-- end faq-panel -->


                    <div class="faq-panel">
                        <div class="faq-heading">
                            <h4 class="faq__title">เรียนออนไลน์คืออะไร?<i class="fa fa-angle-right"></i></h4>
                        </div><!-- end accordion__title -->
                        <div class="faq-content">
                            <p class="faq__desc">
                                เรียนออนไลน์คือการเรียนผ่านวิดีโอผ่านเว็บไซต์ Hubjung ซึ่งผู้เรียนสามารถ เรียนจากที่ไหนก็ได้ เมื่อไรก็ได้ ซ้ำกี่ครั้งก็ได้
                            </p>
                        </div><!-- end faq-content -->
                    </div><!-- end faq-panel -->


                    <div class="faq-panel">
                        <div class="faq-heading">
                            <h4 class="faq__title">วิธีสมัครเรียนคอร์สออนไลน์ <i class="fa fa-angle-right"></i></h4>
                        </div><!-- end accordion__title -->
                        <div class="faq-content">
                            <p class="faq__desc">
                              ท่านจะสามารถเรียนคอร์สออนไลน์ได้ หลังจากที่ท่านชำระเงินเสร็จแล้ว
                              <br />
                              วิธีสมัครเรียนทำดังนี้ค่ะ<br />
                              1) เข้าไปที่ www.Hubjung.com<br />
                              2) เลือกวิชาที่ท่านสนใจ<br />
                              3) กดปุ่ม "ชำระเงินเพื่อเริ่มเรียน"<br />
                              4) หากท่านยังไม่ได้สมัครสมาชิก ระบบจะให้ท่านสมัครสมาชิกก่อน ให้ท่านดำเนินตามขั้นตอน<br />
                              5) เลือกวิธีชำระเงินที่ท่านสะดวก<br />
                              6) ดำเนอนการชำระเงินตามขั้นตอน
                            </p>
                        </div><!-- end faq-content -->
                    </div><!-- end faq-panel -->


                    <div class="faq-panel">
                        <div class="faq-heading">
                            <h4 class="faq__title">ชำระเงินช่องทางไหนได้บ้าง?<i class="fa fa-angle-right"></i></h4>
                        </div><!-- end accordion__title -->
                        <div class="faq-content">
                            <p class="faq__desc">
                              ท่านสามารถชำระเงินด้วยช่องทางต่อไปนี้
                              <br />
                                1) บัตรเครดิต (เรียนได้เลยทันที)<br />
                                2) Paypal (เรียนได้เลยทันที)<br />
                                3) โอนเงินธนาคาร (เรียนได้ภายใน 24 ชั่วโมง หลังจากที่แจ้งโอนเงิน)<br />
                                4) ชำระเงินผ่านเคาท์เตอร์ อาทิ TRUE, Family Mart, เคาท์เตอร์ธนาคาร เป็นต้น (เรียนได้เลยทันที)
                            </p>
                        </div><!-- end faq-content -->
                    </div><!-- end faq-panel -->


                    <div class="faq-panel">
                        <div class="faq-heading">
                            <h4 class="faq__title">ใช้เวลานานแค่ไหนกว่าจะเข้าเรียนได้ หลังจากที่ชำระเงินแล้ว?<i class="fa fa-angle-right"></i></h4>
                        </div><!-- end accordion__title -->
                        <div class="faq-content">
                            <p class="faq__desc">
                              ถ้าชำระด้วยบัตรเครดิตจะเรียนได้เลยทันที
                              <br />
                              ถ้าโอนเงินธนาคารจะเรียนได้ภายใน 24 ชั่วโมงหลังจากที่แจ้งการโอนบนเว็บไซต์ เพราะทาง Hubjung ต้องรอตรวจสอบกับธนาคารค่ะ
                            </p>
                        </div><!-- end faq-content -->
                    </div><!-- end faq-panel -->


                    <div class="faq-panel">
                        <div class="faq-heading">
                            <h4 class="faq__title">Hubjung ออกใบเสร็จรับเงิน/ใบกำกับภาษีได้หรือไม่ ?<i class="fa fa-angle-right"></i></h4>
                        </div><!-- end accordion__title -->
                        <div class="faq-content">
                            <p class="faq__desc">
                              Hubjung สามารถออกใบเสร็จรับเงิน/ใบกำกับภาษีได้ค่ะ
                              <br />
                            เมื่อชำระเงินแล้ว สามารถแจ้งขอไปที่ info@Hubjung.com โดยแจ้ง<br />
                            - อีเมล์ที่สมัครกับ Hubjung<br />
                            - คอร์สออนไลน์ที่ซื้อไป<br />
                            - วันที่/เวลา ที่ชำระเงิน<br />
                            - ชื่อบริษัท / ชื่อ นามกสุล<br />
                            - ที่อยู่บริษัท / ที่อยู่ตามทะเบียนบ้าน<br />
                            - เลขประจำตัวผู้เสียภาษี / เลขประจำตัวประชาชน
                            </p>
                        </div><!-- end faq-content -->
                    </div><!-- end faq-panel -->


                    <div class="faq-panel">
                        <div class="faq-heading">
                            <h4 class="faq__title">กรอกคูปองส่วนลดอย่างไร่ ?<i class="fa fa-angle-right"></i></h4>
                        </div><!-- end accordion__title -->
                        <div class="faq-content">
                            <p class="faq__desc">
                              หากท่านได้รับคูปองส่วนลด ท่านสามารถกรอกคูปองส่วนลดหลังจากที่ท่านกดปุ่ม "ชำระเงินเพื่อเริ่มเรียน"
                              <br />
                              หากคูปองถูกต้อง ท่านจะเห็นราคาลดลงอัตโนมัติ
                              <br />
                              หมายเหต: คูปองส่วนลดใช้ได้เฉพาะกับคอร์สออนไลน์ที่เข้าร่วมรายการเท่านั้น
                            </p>
                        </div><!-- end faq-content -->
                    </div><!-- end faq-panel -->

                    <div class="faq-panel">
                        <div class="faq-heading">
                            <h4 class="faq__title">วิธีเข้าเรียนคอร์สออนไลน์  ?<i class="fa fa-angle-right"></i></h4>
                        </div><!-- end accordion__title -->
                        <div class="faq-content">
                            <p class="faq__desc">
                              หลังจากที่ท่านชำระเงินคอร์สออนไลน์แล้ว ท่านสามารถเข้าเรียนด้วยวิธีต่อไปนี้ค่ะ<br />
                              1) เข้าไปที่ www.Hubjung.com<br />
                              2) เข้าสู่ระบบด้วยอีเมล์ที่ใช้ลงทะเบียนเรียน (หรือ ใช้ Sign in with Google หรือ Sign in with Facebook หากใช้ Google หรือ Facebook ในการ เข้าสู่ระบบ)<br />
                              3) เมือเข้าเสร็จ ให้เลือกไปที่เมนู 'คอร์สเรียนของฉัน' ด้านบน<br />
                              4) จะมีคอร์สออนไลน์ที่ท่านชำระเงินแล้วอยู่ในนั้น ให้กดเข้าไป<br />
                              5) กดปุ่ม 'กลับไปเรียนต่อ' ปุ่มสีเขียว<br />
                              6) เรียนได้เลย
                            </p>
                        </div><!-- end faq-content -->
                    </div><!-- end faq-panel -->


                    <div class="faq-panel">
                        <div class="faq-heading">
                            <h4 class="faq__title">เข้าเรียน Hubjung ด้วยอุปกรณ์ใดได้บ้าง  ?<i class="fa fa-angle-right"></i></h4>
                        </div><!-- end accordion__title -->
                        <div class="faq-content">
                            <p class="faq__desc">
                              ท่านสามารถเข้าเรียน Hubjung ได้ทุกอุปกรณ์ที่เชื่อมต่อกับอินเตอร์เน็ต ไม่ว่าจะเป็น Windows Mac Android หรือ iOS ค่ะ
                              <br />
                              หากท่านใช้เครื่อง Android หรือ PC เราขอแนะนำให้เข้าเรียนด้วย Chrome เพราะเป็น browser ที่รองรับการรับชมวิดีโอได้ดีที่สุด<br />
                              หากท่านใช้เครื่อง Apple เราขอแนะนำให้เข้าเรียนด้วย Chrome หรือ Safari ค่ะ
                            </p>
                        </div><!-- end faq-content -->
                    </div><!-- end faq-panel -->


                    <div class="faq-panel">
                        <div class="faq-heading">
                            <h4 class="faq__title">วิธีดาวน์โหลดเอกสารประกอบการเรียน ?<i class="fa fa-angle-right"></i></h4>
                        </div><!-- end accordion__title -->
                        <div class="faq-content">
                            <p class="faq__desc">
                              สำหรับคอร์สออนไลน์ที่มีเอกสารให้ดาวน์โหลด ท่านสามารถดาวน์โหลดได้โดยการเข้าไปเรียนด้วยคอมพิวเตอร์ และกดปุ่ม "ดาวน์โหลดเอกสาร"
                            </p>
                        </div><!-- end faq-content -->
                    </div><!-- end faq-panel -->


                    <div class="faq-panel">
                        <div class="faq-heading">
                            <h4 class="faq__title">คอร์สออนไลน์มีอายุการใช้งานหรือไม่ เรียนได้นานแค่ไหน  ?<i class="fa fa-angle-right"></i></h4>
                        </div><!-- end accordion__title -->
                        <div class="faq-content">
                            <p class="faq__desc">
                              คอร์สออนไลน์ส่วนมากไม่มีจำกัดอายุการใช้งาน ท่านสามารถเข้ามาเรียนกี่ครั้งก็ได้ เมื่อไรก็ได้ ตลอดชีพ

                              สำหรับคอร์สออนไลน์ที่จำกัดอายุการใช้งาน ท่านสามารถเข้ามาเรียนกี่ครั้งก็ได้ เมื่อไรก็ได้ ภายในระยะเวลาที่กำหนด

                              ท่านสามารถตรวจสอบอายุการใช้งานของแต่ละคอร์สในหน้าคอร์สนั้นๆ
                            </p>
                        </div><!-- end faq-content -->
                    </div><!-- end faq-panel -->





                </div><!-- end faq-body -->
            </div><!-- end col-lg-8-->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end faq-area -->
<!-- ================================
       START FAQ AREA
================================= -->



@endsection

@section('scripts')



@stop('scripts')
