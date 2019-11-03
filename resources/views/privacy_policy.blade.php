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

                    <h2 class="section__title">Privacy Policy</h2>
                    <span class="section__divider"></span>
                    <h5>
                      นโยบายความเป็นส่วนตัว
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
                                <div class="col-lg-12">


    <h6> เมื่อเข้ามาใช้งานระบบของเรา บริษัทจะเก็บข้อมูลเกี่ยวกับผู้ใช้งานไว้ ซึ่งข้อมูลที่จะเก็บจะขึ้นอยู่กับบริการหรือสินค้าที่ผู้ใช้งานได้เลือกไว้ เช่น </h6><br />
    <p>
      ข้อมูลเกี่ยวกับผู้ใช้งานและบัญชีของผู้ใช้งาน เมื่อผู้ใช้งานอัพโหลดรูปภาพขึ้นในระบบ บริษัทจะเก็บข้อมูลดังนี้
    </p>


    <ul class="kim-link">
      <li>
        ชื่อและนามสกุล
      </li>
      <li>
        อีเมล์
      </li>
      <li>
        พาสเวิร์ด
      </li>
    </ul>
    <p>
ข้อมูลเหล่านี้มีความจำเป็นในการสร้างบัญชีผู้ใช้งานสำหรับจัดเก็บและดูแลการใช้งานต่างๆให้อยู่ในที่เดียว เราใช้ข้อมูลเหล่านี้ในการยืนยันตัวตนของผู้ใช้งานเพื่อให้เกิดความปลอดภัยต่อการเข้าใช้งาน ถ้าผู้ใช้งานมีการสั่งซื้อสินค้าหรือบริการทางบริษัทจะเก็บข้อมูลและทำการวิเคราะห์เพื่อเราจะได้ให้บริการผู้ใช้งานได้อย่างตรงความต้องการมากขึ้น      </p>

    <p>
      ข้อมูลการติดต่อ  บริษัทจะเก็บข้อมูลดังนี้:
    </p>
    <ul class="kim-link">
      <li>
        ที่อยู่จัดส่ง
      </li>
      <li>
        อีเมล์
      </li>
      <li>
        เบอร์โทรศัพท์
      </li>

    </ul>
    <p>
    เราใช้ข้อมูลเหล่านี้ในการยืนยันและติดต่อผู้ใช้งานกรณีมีคำถามหรือข้อสงสัยต่างๆ เราเก็บที่อยู่จัดส่งของผู้ใช้ง่ายไว้เพื่อความสะดวกของผู้ใช้งานในการที่ไม่ต้องกรอกข้อมูลเหล่านี้อีกรอบเมื่อมีการสั่งสินค้าหรือบริการอีก
    </p>
    <br />
    <p>
      ข้อมูลจากสื่อสังคมออนไลน์ : ถ้าผู้ใช้งานอัพโหลดรูปภาพผ่านสื่อสังคมออนไลน์ ทางบริษัทจะเก็บข้อมูลดังนี้
    </p>
    <ul class="kim-link">
      <li>
        ข้อมูลที่เปิดเผยสาธารณะ ซึ่งอาจรวมถึง:
      </li>
      <li>
        ชื่อและนามสกุล
      </li>
      <li>
        อีเมล์
      </li>
      <li>
        เพศ
      </li>
      <li>
        อายุ
      </li>
      <li>
        ตำแหน่ง
      </li>
      <li>
        ข้อมูลอื่นๆที่ผู้ใช้งานยินยอมให้เปิดเผยเป็นสาธารณะ
      </li>
      <li>
        รูปภาพจากบัญชีสื่อสังคมออนไลน์ที่ผู้ใช้งานอัพโหลดเข้ามาในระบบของเรา
      </li>
    </ul>
    <p>
      ข้อมูลเหล่านี้มีความจำเป็นต่อการยืนยันตัวตนต่อบัญชีสื่อสังคมออนไลน์ของผู้ใช้งานเพื่ออัพโหลดรูปภาพเข้าสู่ระบบของเรา เราเก็บข้อมูลเหล่านี้รวมถึงข้อมูลอื่นๆที่ผู้ใช้งานมีปฎิสัมพันธ์กับเราผ่านสื่อออนไลน์เช่น เมื่อผู้ใช้งานกดชอบในหน้าเฟซบุ๊คของเรา ข้อมูลต่างๆที่เราได้รับจะขึ้นอยู่กับการตั้งค่าความเป็นส่วนตัวของผู้ใช้งานเอง โปรดตรวจสอบและปรับการตั้งค่าต่างๆเหล่านี้ในสื่อสังคมออนไลน์ของผู้ใช้งาน</p>
    <br />
    <p>
      รูปของผู้ใช้งาน :  เมื่อผู้ใช้งานตัดสินใจอัพโหลดรูปภาพเขามาในระบบของเรา ไม่ว่าจะเข้าสู่บัญชีผู้ใช้งานที่มีอยู่กับทางบริษัทหรือไม่ เราจะเก็บข้อมูลดังนี้

    </p>
    <ul class="kim-link">
      <li>
        รูปภาพที่ผู้ใช้งานอัพโหลด
      </li>
    </ul>

    <h4>การป้องกันข้อมูลของผู้ใช้งาน </h4>
    <p>
      ทางบริษัทได้ใช้และติดตั้งระบบความปลอดภัยที่มีมาตราฐาน และพยายามเป็นยิ่งเพื่อป้องกันการเข้าถึงข้อมูลจากบุคคลภายนอกโดยใช้เทคโนโลยีที่มีอยู่ในปัจจุบัน อย่างไรก็ดีในทางปฎิบัติเราไม่สามารถรับประกันได้100% หากผู้ใช้งานมีข้อสงสัยเกี่ยวกับมาตราฐานความปลอดภัยของข้อมูลและการปฎิบัติของเรา
      ผู้ใช้งานสามารถติดต่อเราได้ตามที่อยู่ข้างล่าง อย่างไรก็ดีผู้ใช้งานจำเป็นที่จะต้องรักษาข้อมูลความเป็นส่วนตัวของตัวเองไว้ด้วยและแจ้งทางบริษัททันทีถ้าสงสัยว่ามีการเข้าถึงข้อมูลส่วนตัวของผู้ใช้งานจากบุคคลอื่น</p>
    <p>
ถ้าผู้ใช้งานใช้คอมพิวเตอร์จากสถานที่สารธารณะเช่น ห้องสมุด, โรงเรียน หรือ คอมพิวเตอร์ที่ใช้ง่านร่วมกันเช่นที่บ้านหรือของเพื่อน เราแนะนำให้ผู้ใช้งานออกจากระบบทุกครั้งเมื่อใช้งานเสร็จและปิดบราวเซอร์ทุกครั้งก่อนลุกออกจากที่นั่งเพื่อป้องกันการเข้าถึงข้อมูลจากบุคคลอื่น      </p>
    <h4>การเก็บไว้ซึ่งข้อมูล </h4>
    <p>
      ทางบริษัทจะเก็บข้อมูลของผู้ใช้งานไว้นานเท่าที่ผู้ใช้งานยังคงใช้บริการของเราอยู่ ในส่วนของรูปภาพที่ผู้ใช้งานได้อัพโหลดเข้ามาในระบบ หรือ งานที่ผู้ใช้งานได้สร้างขึ้นมา ไม่ว่าจะได้ทำการเข้าสู่ระบบบัญชีของทางบริษัทหรือไม่  รวมถึงงานที่มีการสั่งทำแล้ว เราจะจัดเก็บเป็นระยะเวลาดังต่อไปนี้
งานที่สร้างโดยไม่ได้เข้าสู้ระบบบัญชีของบริษัท : ลบหลังจาก 3 วัน <br />
งานที่สร้างในระบบแต่ไม่ได้บันทึก : ลบหลักจาก 14 วัน โดยจะมีอีเมล์แจ้ง7 วันก่อนจะทำการลบ<br />
งานที่สร้างในระบบแต่ไม่ได้สั่งซื้อ : ลบหลักจาก 60 วัน โดยจะมีอีเมล์แจ้ง7 วันก่อนจะทำการลบ<br />
งานที่สร้างในระบบและได้มีการสั่งซื้อ : ลบหลักจาก 90 วัน โดยจะมีอีเมล์แจ้ง7 วันก่อนจะทำการลบ
    </p>

    <h4>การแจ้งการเปลี่ยนแปลงของเงื่อนไขการให้บริการและนโยบายความเป็นส่วนตัว </h4>
    <p>
      เรามีการปรับเปลี่ยน แก้ไข เพิ่มเติม เงื่อนไขการให้บริการและนโยบายความเป็นส่วนตัวตามข้อกฎหมายหรือเมื่อมีสินค้าและบริการใหม่ๆที่เราได้มีการนำเสนอ เราแนะนำให้ผู้ใช้งานเข้ามาอ่านเงื่อนไขการให้บริการและนโยบายความเป็นส่วนตัวนี้ก่อนการใช้งานทุกครั้ง
      หากมีการเปลี่ยนแปลงทางบริษัทจะมีการประกาศและแจ้งให้ทราบในหน้าเวปของเรา หากผู้ใช้งานไม่เห็นด้วยในเนื้อหาการเปลี่ยนแปลงในเงื่อนไขการให้บริการและนโยบายความเป็นส่วนตัวของบริษัท เราแนะนำให้ผู้ใช้งานหยุดใช้ระบบและบริการของเรา
    </p>




                                </div><!-- end col-lg-6 -->





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
