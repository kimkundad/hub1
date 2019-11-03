@extends('layouts.template')
@section('stylesheet')

<style>
.breadcrumb-area {
    background-image: url('{{url('assets/home/1920_450.png')}}');
}
p{
  margin-bottom: 10px;
}
.kim-link li {
    position: relative;
    font-weight: 500;
    margin-bottom: 10px;
    padding-left: 20px;
}
.kim-link li:after {
    position: absolute;
    content: "";
    top: 6px;
    left: 0;
    width: 10px;
    height: 10px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    background-color: rgba(127, 136, 151, 0.4);
}
</style>

@stop('stylesheet')
@section('content')


<!-- ================================
       START ADMISSION AREA
================================= -->
<section class="admission-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">

                    <h2 class="section__title">Returns & Exchanges</h2>
                    <span class="section__divider"></span>
                    <h5>
                      การรับประกันความพึงพอใจและนโยบายการคืนสินค้า
                    </h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="admission-body">
                    <div class="contact-form-action">
                        <!--Contact Form-->
                        <form method="post">
                            <div class="row">
                              <div class="col-md-12 ">
                <h5 class="theme-payment-page-form-title">นโยบายการซื้อสินค้า</h5>
                <h5 class="theme-payment-page-form-title">ขั้นตอนการสั่งซื้อสินค้า</h5>
                <p class="theme-payment-page-signin-subtitle">1 โดยแจ้งชื่อ ที่อยู่ เบอร์โทรที่ติดต่อสะดวก</p>

                <p class="theme-payment-page-signin-subtitle">2 รายการสินค้าที่ต้องการซื้อโดยระบุชนิดสินค้า ขนาด สี (ถ้ามี) </p>

                <p class="theme-payment-page-signin-subtitle">3 จำนวนสินค้าที่ต้องการ</p>

                <p class="theme-payment-page-signin-subtitle">4 การรับสินค้าในกรณีให้จัดส่งโปรดแจ้งสถานที่ ชื่อผู้รับสินค้า และเบอร์ติดต่อ  </p>

                <p class="theme-payment-page-signin-subtitle">5 ขอสงวนสิทธิ์การขาย กรณีไม่แจ้งชื่อ ที่อยู่ เบอร์ติดต่อกลับ</p>


                <h5 class="theme-payment-page-form-title">สั่งซื้อผ่านระบบออนไลน์</h5>
                <p class="theme-payment-page-signin-subtitle">วิธีนี้จะสะดวกรวดเร็วและปลอดภัยที่สุด ท่านสามารถสั่งซื้อได้ตลอดเวลา มีขั้นตอนดังนี้</p>

                <p class="theme-payment-page-signin-subtitle">(1) การโอนเงินผ่านธนาคาร</p>

                <p class="theme-payment-page-signin-subtitle">ผู้ซื้อสามารถชำระเงินผ่านเครื่องเอทีเอ็มหรือโอนเงินผ่านธนาคารทางอินเทอร์เน็ต (“การโอนเงินผ่านธนาคาร”) ไปยังบัญชีธนาคาร ที่เรากำหนดไว้ ผู้ซื้อจะต้องส่งใบเสร็จการรับโอนเงินหรือหมายเลขอ้างอิงการทำรายการชำระเงินให้แก่ AcmeTrader เพื่อทำการตรวจสอบผ่านฟังก์ชั่น “อัปโหลดใบเสร็จ” ที่อยู่ในแอปของ AcmeTrader เพื่อเป็นการยืนยันการชำระเงิน หาก AcmeTrader ไม่ได้รับการยืนยันการชำระเงินภายในสาม (3) วัน คำสั่งซื้อของผู้ซื้อจะถูกยกเลิก</p>

                <p class="theme-payment-page-signin-subtitle">(2) บัตรเครดิต</p>

                <p class="theme-payment-page-signin-subtitle">การชำระผ่านบัตรเครดิตจะดำเนินการผ่านช่องทางการชำระเงินของบุคคลภายนอก และชนิดของบัตรเครดิตที่ช่องทางการชำระเงินเหล่านี้ยอมรับอาจแตกต่างกันไปตามเขตอำนาจตามกฎหมายที่คุณอยู่</p>


                <h5 class="theme-payment-page-form-title">เงื่อนไขการยกเลิกคำสั่งซื้อ</h5>
                <p class="theme-payment-page-signin-subtitle">– ท่านสามารถยกเลิกธุรกรรมการสั่งซื้อได้ก่อนการทำการโอนชำระค่าสินค้าเท่านั้น</p>


                <h5 class="theme-payment-page-form-title">การแจ้งยกเลิกคำสั่งซื้อ</h5>
                <p class="theme-payment-page-signin-subtitle">หากท่านต้องการยกเลิกคำสั่งซื้อ โปรดติดต่อทางโทรศัพท์หมายเลข 0 2113 1330 หรือ อีเมล์ support@acdicator.live</p>


                <h5 class="theme-payment-page-form-title">นโยบายการชำระเงิน</h5>
                <p class="theme-payment-page-signin-subtitle">เมื่อท่านได้ทำการสั่งซื้อสินค้าแล้ว ท่านสามารถดำเนินการชำระเงินได้โดยมีรายละเอียด ดังนี้</p>

                <p class="theme-payment-page-signin-subtitle">ช่องทางการชำระเงิน</p>

                <p class="theme-payment-page-signin-subtitle">– โอนผ่านบัญชีธนาคาร ดังต่อไปนี้</p>

                <p class="theme-payment-page-signin-subtitle">ชื่อบัญชี : บริษัท แอ็คดิเคเตอร์ จำกัด</p>

                <p class="theme-payment-page-signin-subtitle">ธนาคาร : กสิกรไทย</p>

                <p class="theme-payment-page-signin-subtitle">เลขบัญชี : 047-3-29595-4</p>

                <p class="theme-payment-page-signin-subtitle">Swift code : KASITHBK </p>

                <p class="theme-payment-page-signin-subtitle">– ชำระด้วยบัตรเครดิตผ่าน ระบบ Online Payment จะเปิดดำเนินการในอนาคต</p>


                <h5 class="theme-payment-page-form-title">ยืนยันการชำระเงิน</h5>
                <p class="theme-payment-page-signin-subtitle">เมื่อดำเนินการชำระเงินเรียบร้อยแล้ว ท่านต้องยืนยันการชำระเงินโดยผ่านช่องทาง ดังต่อไปนี้</p>

                <p class="theme-payment-page-signin-subtitle">– ส่งหลักฐานการโอนเงิน เช่น file scan ของหลักฐานการโอนเงิน, print screen หลักฐานการโอนเงินของหน้าจอคอมพิวเตอร์ (กรณีโอนผ่าน Internet Banking) เข้าระบบในขั้นตอนการแนบไฟล์หลักฐานการชำระเงิน</p>

                <p class="theme-payment-page-signin-subtitle">– ในกรณีที่ระบบการแนบไฟล์มีปัญหา ผู้ใช้งานสามารถส่งคำร้องในการดำเนินธุรกรรมการชำระเงินให้สมบูรณ์ พร้อมหลักฐานการซื้อสินค้า และหลักฐานการชำระเงินมาที่ support@acdicator.live โดยระบุหมายเลขสั่งซื้อมาด้วย</p>


                <h5 class="theme-payment-page-form-title">เจ้าหน้าที่ยืนยันการรับชำระเงิน</h5>
                <p class="theme-payment-page-signin-subtitle">เมื่อตรวจสอบข้อมูลการชำระเงินเรียบร้อยแล้วเจ้าหน้าที่จะส่งอีเมล์ยืนยันว่าได้รับชำระเงินค่าสินค้าแล้ว ในกรณีที่ท่านไม่ได้รับการยืนยันการรับชำระเงินภายใน 24 ชั่วโมง (หรือ 2 วันในกรณีติดวันหยุดทำการ) กรุณาติดต่อที่หมายเลขโทรศัพท์ 0 2113 1330 หรือส่งหลักฐานพร้อมข้อมูลต่างๆมาที่ support@acdicator.live ภายในวันและเวลาทำการ</p>


                <h5 class="theme-payment-page-form-title">นโยบายการจัดส่งสินค้า</h5>
                <h5 class="theme-payment-page-form-title">เงื่อนไขการจัดส่งสินค้า</h5>
                <p class="theme-payment-page-signin-subtitle">– บริษัทฯ จัดส่งสินค้าหลังจากได้ตรวจสอบการชำระเงินเรียบร้อยแล้วเท่านั้น</p>

                <p class="theme-payment-page-signin-subtitle">– บริษัทฯ จัดส่งสินค้า ทุกวันทำการเว้นวันหยุดราชการ โดยรายการสั่งซื้อของผู้ซื้อต้องยืนยันการชำระเงินก่อนส่งสินค้า  ทั้งนี้ถ้าไม่สามารถจัดส่งในวันที่กำหนดไว้ได้ บริษัทฯ ขอสงวนสิทธิ์ในการจัดส่งสินค้าในวันทำการถัดไป </p>
                
                <p class="theme-payment-page-signin-subtitle">– เมื่อสินค้าถูกจัดส่งเรียบร้อยแล้ว ระบบการจัดส่ง และ/หรือ เจ้าหน้าที่จะแจ้งยืนยันการจัดส่ง พร้อมทั้งหมายเลขการตรวจสอบการเดินทางของสินค้า (Tracking Number) ไปทางช่องทางการติดต่อของผู้ซื้อ เช่น Email หรือทางโทรศัพท์ </p>


                <h5 class="theme-payment-page-form-title">ช่องทางการจัดส่งสินค้า</h5>
                <p class="theme-payment-page-signin-subtitle">– ส่ง EMS  โดย บริษัท ไปรษณีย์ไทย จำกัด (มหาชน) หรือ บริษัทขนส่งพัสดุเอกชน </p>

                <p class="theme-payment-page-signin-subtitle">– ระยะเวลาในการจัดส่งสินค้าสำหรับกรุงเทพฯ และ ปริมณฑล ใช้ระยะเวลา 1-2 วัน </p>

                <p class="theme-payment-page-signin-subtitle">– ระยะเวลาในการจัดส่งสินค้าสำหรับที่อยู่ต่างจังหวัดสินค้า ใช้ระยะเวลา 3-4 วัน </p>

                <p class="theme-payment-page-signin-subtitle">– ระยะเวลาในการจัดส่งสินค้าสำหรับที่อยู่ต่างประเทศ ขึ้นอยู่กับระยะทาง และเงื่อนไข ข้อกำหนดของทางบริษัทขนส่งพัสดุเอกชนกำหนดเท่านั้น</p>

                <p class="theme-payment-page-signin-subtitle">– ในกรณีที่ท่านไม่ได้รับสินค้าภายในกำหนด ผู้ซื้อสินค้าสามารถติดต่อสอบถามได้ที่ บริษัท ไปรษณีย์ไทย จำกัด (มหาชน) หรือ บริษัทขนส่งพัสดุเอกชนเท่านั้น</p>


                <h5 class="theme-payment-page-form-title">เงื่อนไขการรับผิดชอบในการจัดส่งสินค้า</h5>
                <p class="theme-payment-page-signin-subtitle">– บริษัทฯ ขอสงวนสิทธิ์ในการจัดส่งสินค้าล่าช้าได้ แต่ไม่เกิน 3 วันทำการ โดยจะแจ้งให้ลูกค้าทราบถึงความล่าช้าที่เกิดขึ้น</p>

                <p class="theme-payment-page-signin-subtitle">– เมื่อสินค้าถูกส่งไปแล้ว บริษัท ไปรษณีย์ไทย จำกัด (มหาชน) หรือ บริษัทขนส่งพัสดุเอกชน จะเป็นผู้รับผิดชอบต่อความเสียหายที่เกิดขึ้น </p>

                <p class="theme-payment-page-signin-subtitle">– ในกรณีที่สินค้าเกิดความเสียหายจากการส่งทาง EMS บริษัท ไปรษณีย์ไทย จำกัด (มหาชน) หรือ บริษัทขนส่งพัสดุเอกชน รับภาระชดเชยตามกำหนด ซึ่งทางบริษัทฯ จะคืนให้ลูกค้าเมื่อได้รับค่าชดเชยแล้ว</p>

                <p class="theme-payment-page-signin-subtitle">– ในกรณีที่สินค้าถูกส่งกลับคืนมายังบริษัทฯ เนื่องจากข้อมูลที่ลูกค้าให้ไว้มีความผิดพลาด ลูกค้าต้องชำระค่าจัดส่งสินค้าใหม่อีกครั้ง</p>


                <h5 class="theme-payment-page-form-title">นโยบายการคืนสินค้า / เปลี่ยนสินค้า</h5>
                <p class="theme-payment-page-signin-subtitle">เพื่อเป็นการสร้างความพึงพอใจสูงสุดให้กับท่าน เมื่อท่านได้รับสินค้าแล้วกรุณาตรวจสอบความเรียบร้อยของสินค้า หากพบว่ามีความผิดพลาดที่เกิดจากทางบริษัทฯ ผู้ผลิต ท่านสามารถเปลี่ยน/คืน สินค้าได้ โดยมีขั้นตอนดังต่อไปนี้</p>

                <p class="theme-payment-page-signin-subtitle">– กรุณาติดต่อบริษัทฯ เพื่อแจ้งเปลี่ยน/คืน ทันที นับตั้งแต่ได้รับสินค้า</p>

                <p class="theme-payment-page-signin-subtitle">– ทำการจัดส่งสินค้ากลับคืนมายังบริษัทฯ โดยช่องทางที่ตรวจสอบได้ เช่น ส่งทาง EMS ซึ่งทางบริษัทฯ จะเป็นผู้รับภาระค่าจัดส่ง(คืนให้พร้อมค่าสินค้า)</p>

                <p class="theme-payment-page-signin-subtitle">– สินค้าที่ถูกส่งกลับมาต้องอยู่ในสภาพเดิมเหมือนที่ท่านรับสินค้า </p>

                <p class="theme-payment-page-signin-subtitle">– เมื่อบริษัทฯ ได้รับสินค้าและตรวจสอบความผิดพลาดตามที่แจ้งมาแล้ว จะทำการคืนค่าสินค้าตามที่ตกลงไว้</p>

                <p class="theme-payment-page-signin-subtitle">ในการคืนหรือเปลี่ยนสินค้า กรุณาติดต่อ 02 113 1330 หรือแจ้งผ่านทางอีเมล support@acdicator.live</p>


                <h5 class="theme-payment-page-form-title">เงื่อนไขการคืนเงิน/เปลี่ยนสินค้า</h5>
                <p class="theme-payment-page-signin-subtitle">– บริษัทฯ ขอสงวนสิทธิ์ในการคืนเงิน, เปลี่ยนสินค้า ในกรณีที่สินค้ามีความผิดพลาดจากผู้ผลิตเท่านั้น</p>

                <p class="theme-payment-page-signin-subtitle">– บริษัทฯ จะเปลี่ยนสินค้าเป็นชิ้นใหม่ตามที่ผู้ซื้อต้องการ ในกรณีที่สินค้ารุ่นเดิมหมด บริษัทจะทำการคืนเงินให้ท่าน หรือเสนอสินค้าที่มีมูลค่าใกล้เคียงให้แทน</p>

                <p class="theme-payment-page-signin-subtitle">– บริษัทฯ จะทำการคืนค่าสินค้าโดยจะโอนค่าสินค้าพร้อมค่าส่งสินค้ากลับมา ไปยังบัญชีธนาคาร ที่มีชื่อเดียวกับผู้ซื้อสินค้าเท่านั้น </p>

                <p class="theme-payment-page-signin-subtitle">ในกรณีที่ไม่รับคืนหรือเปลี่ยนสินค้า</p>

                <p class="theme-payment-page-signin-subtitle">1. สินค้าได้ถูกใช้งานแล้ว</p>

                <p class="theme-payment-page-signin-subtitle">2. สินค้าไม่อยู่ในสภาพเดิม เช่น หีบห่อชำรุด เป็นต้น</p>

                <p class="theme-payment-page-signin-subtitle">3. สินค้าไม่ใช่รุ่น หรือแบบที่จัดส่งไป</p>


              </div>





                            </div><!-- end row -->
                        </form>
                    </div><!-- end contact-form-action -->
                </div><!-- end admission-body -->
            </div><!-- end col-lg-10 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end admission-area -->
<!-- ================================
       START ADMISSION AREA
================================= -->



@endsection

@section('scripts')



@stop('scripts')
