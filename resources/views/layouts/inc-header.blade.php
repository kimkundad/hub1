<!--======================================
        START HEADER AREA
    ======================================-->
<section class="header-menu-area">
    <div class="header-menu-fluid">


        <div class="header-menu-content">
            <div class="container-fluid">
                <div class="row align-items-center main-menu-content">
                    <div class="col-lg-3">
                        <div class="logo-box">
                            <a href="{{url('/')}}" class="logo" title="Aduca"><img src="{{url('home/images/logo_v2.png')}}" alt="logo"></a>
                            <div class="header-category">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-th"></i> หมวดหมู่</a>
                                        <ul class="dropdown-menu-item">

                                          @if((get_menu()))
                                          @foreach(get_menu() as $u)
                                            <li>
                                                <a href="#">{{$u->name_department}} <span class="la la-angle-right"></span></a>
                                                <ul class="sub-menu">
                                                  @if($u->options != null)
                                                    @foreach($u->options as $j)
                                                    <li><a href="{{url('category/'.$j->id)}}">{{$j->name_sub_depart}}</a></li>
                                                    @endforeach
                                                  @endif
                                                </ul>
                                            </li>
                                            @endforeach
                                          @endif

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-9">
                        <div class="menu-wrapper">
                            <div class="contact-form-action">
                                <!--Contact Form-->
                                <form method="post">
                                    <div class="row">
                                        <div class="col-lg-10 form-group">
                                            <input class="form-control" type="text" name="search" placeholder="ค้นหาทุกอย่าง">
                                            <span class="la la-search search-icon"></span>
                                        </div><!-- end col-lg-6 -->
                                    </div><!-- end row -->
                                </form>
                            </div><!-- end contact-form-action -->
                            <nav class="main-menu">
                                <ul>
                                    <li><a href="{{url('teachers')}}">รู้จักอาจารย์</a></li>
                                    <li><a href="{{url('contact')}}">ติดต่อเรา</a></li>

                                </ul><!-- end ul -->

                            </nav><!-- end main-menu -->


                            <div class="logo-right-button" style="width: 250px;">
                              <div class="d-none d-sm-block">
                                @if (Auth::guest())
                                <a href="{{url('login')}}" class="theme-btn  " style="margin-right:10px; padding: 0 20px 0 20px;">เข้าสู่ระบบ</a>
                                <a href="{{url('register')}}" class="theme-btn  sign-btn btn__google" style="padding: 0 20px 0 20px;">ลงทะเบียน</a>
                                @else
                                <nav class="main-menu ">
                                <ul>

                                    <li>
                                        <a href="#">
                                          @if(Auth::user()->provider == 'email')
                                          <img class="avatar__img" style="border: 1px solid #007791;" src="{{url('assets/images/avatar/'.Auth::user()->avatar)}}" alt="{{Auth::user()->anme}}" title="{{Auth::user()->name}}"/>
                                          @else
                                          <img class="avatar__img" style="border: 1px solid #007791;" src="{{$objs->avatar}}" alt="{{Auth::user()->name}}" title="{{$objs->name}}"/>
                                          @endif

                                        </a>
                                        <ul class="dropdown-menu-item" style="margin-top:8px;">
                                            <li><a href="#">ข้อมูลส่วนตัว</a></li>
                                            <li><a href="{{url('logout')}}">ออกจากระบบ</a></li>
                                        </ul>
                                    </li>
                                </ul><!-- end ul -->
                              </nav><!-- end main-menu -->

                                @endif
                              </div>


                                <div class="side-menu-open">
                                    <span class="menu__bar"></span>
                                    <span class="menu__bar"></span>
                                    <span class="menu__bar"></span>
                                </div>
                            </div><!-- end logo-right-button -->


                            <div class="side-nav-container">
                                <div class="humburger-menu">
                                    <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
                                </div><!-- end humburger-menu -->
                                <div class="side-menu-wrap">
                                    <ul class="side-menu-ul">
                                        <li class="sidenav__item">
                                            <a href="index.html">home</a>
                                            <span class="menu-plus-icon"></span>
                                            <ul class="side-sub-menu">
                                                <li><a href="index.html">Home 01</a></li>
                                                <li><a href="home-2.html">Home 02</a></li>
                                            </ul>
                                        </li>
                                        <li class="sidenav__item"><a href="about.html">about</a></li>
                                        <li class="sidenav__item">
                                            <a href="#">courses</a>
                                            <span class="menu-plus-icon"></span>
                                            <ul class="side-sub-menu">
                                                <li><a href="course-grid.html">course grid</a></li>
                                                <li><a href="course-details.html">course details</a></li>
                                            </ul>
                                        </li>

                                        <li class="sidenav__item">
                                            <a href="blog-grid.html">blog</a>
                                            <span class="menu-plus-icon"></span>
                                            <ul class="side-sub-menu">
                                                <li><a href="blog-grid.html">blog grid</a></li>
                                                <li><a href="blog-single.html">blog detail</a></li>
                                            </ul>
                                        </li>
                                        <li class="sidenav__item">
                                            <a href="contact.html">contact</a>
                                        </li>
                                    </ul>
                                    <div class="side-btn-box">
                                        <a href="admission.html" class="theme-btn">admission</a>
                                    </div>
                                </div><!-- end side-menu-wrap -->
                            </div><!-- end side-nav-container -->
                        </div><!-- end menu-wrapper -->
                    </div><!-- end col-lg-9 -->
                </div><!-- end row -->
            </div><!-- end container-fluid -->
        </div><!-- end header-menu-content -->
    </div><!-- end header-menu-fluid -->
</section><!-- end header-menu-area -->
<!--======================================
        END HEADER AREA
======================================-->
