<section class="footer-area" style="background-color: #f5f5f5;">
    <!--<div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
    </div> -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <a href="/">
                        <img src="{{url('home/images/logo_v2.png')}}" alt="footer logo" class="footer__logo">
                    </a>
                    <ul class="footer-address">

                        <li>สถาบันออนไลน์ สำหรับคนที่ต้องการความก้าวหน้า
                          สอนโดยผู้เชี่ยวชาญ จากประสบการณ์จริง</li>
                    </ul>
                    <ul class="footer-social">
                        <li>
                            <a href="{{ setting()->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                        </li>

                        <li>
                            <a href="{{ setting()->ig }}" target="_blank"><i class="fa fa-instagram"></i></a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
                    </ul>
                </div><!-- end footer-widget -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3 class="footer-title">เมนู</h3>

                    <ul class="footer-link">
                        <li><a href="{{url('about')}}">เกี่ยวกับเรา</a></li>
                        <li><a href="{{url('teachers')}}">รู้จักอาจารย์</a></li>
                        <li><a href="{{url('contact')}}">ติดต่อเรา</a></li>
                        <li><a href="{{url('faq')}}">คำถามที่พบบ่อย</a></li>
                        <li><a href="{{url('blog')}}">บทความ</a></li>
                    </ul>
                </div><!-- end footer-widget -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3 class="footer-title">เกี่ยวกับองค์กร</h3>

                    <ul class="footer-link">
                        <li><a href="{{url('privacy_policy')}}">นโยบายความเป็นส่วนตัว</a></li>
                        <li><a href="{{url('payment')}}">ยืนยันการชำระเงิน</a></li>

                        <li><a href="{{url('terms_conditions')}}">ข้อตกลงและเงื่อนไข</a></li>
                        <li><a href="{{url('returns_exchanges')}}">นโยบายการคืนเงิน</a></li>
                    </ul>
                </div><!-- end footer-widget -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3 class="footer-title">ติดต่อสอบถาม</h3>

                    <ul class="footer-link">
                        <li><a href="#"><i class="la la-envelope"></i> {{ setting()->email }}</a></li>
                        <li><a href="#"><i class="la la-phone-square"></i> {{ setting()->phone }} <br />{{ setting()->time_open }}</a></li>
                        <li><a href="{{ setting()->line_url }}" target="_blank"><img src="{{url('assets/images/line_icon.png')}}" style="height:30px;" /> {{ setting()->line }}</a></li>

                    </ul>
                    <br />
                    <div class="fb-page" data-href="https://www.facebook.com/hubjungacademy/" data-tabs="timeline" data-width="" data-height="70" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                      <blockquote cite="https://www.facebook.com/hubjungacademy/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/hubjungacademy/">HubJung</a></blockquote></div>
                </div><!-- end footer-widget -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
        <br />
        <div class="section-divider"></div>
        <div class="row copyright-content align-items-center" style="margin-top: 20px;">

            <div class="col-lg-10">
                <p class="copy__desc">&copy; 2019 Hubjung. All Rights Reserved. by <a href="#">Hubjung.</a></p>
            </div><!-- end col-lg-9 -->
            <div class="col-lg-2">
                <div class="language-select">
                    <select class="target-lang">
                      <option value="14">ภาษาไทย</option>
                        <option value="1">English</option>

                    </select>
                </div>
            </div>
        </div><!-- end copyright-content -->
    </div><!-- end container -->
</section><!-- end footer-area -->
