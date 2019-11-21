@extends('layouts.template')
@section('stylesheet')




@stop('stylesheet')
@section('content')







<!-- ================================
       START GOOGLE MAP
================================= -->

<!-- ================================
       END GOOGLE MAP
================================= -->

<!-- ================================
       START CONTACT AREA
================================= -->
<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="contact-item contact-item1">
                    <div class="hover-overlay"></div>
                    <span class="la la-user contact__icon"></span>
                    <h4 class="contact__title">About Us</h4>
                    <p class="contact__desc">
                        Lorem ipsum is simply free text dolor
                        sit amet, duise consectetur ullam
                    </p>
                </div><!-- end contact-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 col-sm-6">
                <div class="contact-item contact-item2">
                    <div class="hover-overlay"></div>
                    <span class="la la-map contact__icon"></span>
                    <h4 class="contact__title">Our Location</h4>
                    <p class="contact__desc">
                        660 broklyn street , 88 new york, United states of america
                    </p>
                </div><!-- end contact-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 col-sm-6">
                <div class="contact-item contact-item3">
                    <div class="hover-overlay"></div>
                    <span class="la la-envelope-o contact__icon"></span>
                    <h4 class="contact__title">Contact Info</h4>
                    <ul class="contact__list">
                        <li><a href="mailto:info@example.com"> info@example.com</a></li>
                        <li><a href="tel:009-215-5595"> 009-215-5595</a></li>
                    </ul>
                </div><!-- end contact-item -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
        <div class="row contact-form-wrap">
            <div class="col-lg-5">
                <div class="section-heading">
                    <p class="section__meta">get in touch</p>
                    <h2 class="section__title">Have a Question? Drop Us a Line</h2>
                    <span class="section__divider"></span>
                    <p class="section__desc">
                        Lorem ipsum is simply free text dolor sit amett quie
                        adipiscing elit. When an unknown printer took a galley.
                        quiaies lipsum dolor sit atur adip scing
                    </p>
                    <ul class="section__list">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                    </ul>
                </div><!-- end sec-heading -->
            </div><!-- end col-md-5 -->
            <div class="col-lg-7">
                <div class="contact-form-action">
                    <!--Contact Form-->
                    <form method="post">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 form-group">
                                <input class="form-control" type="text" name="name" placeholder="Your Name">
                                <span class="la la-user input-icon"></span>
                            </div><!-- end col-lg-6 -->

                            <div class="col-lg-6 col-sm-6 form-group">
                                <input class="form-control" type="email" name="email" placeholder="Email Address">
                                <span class="la la-envelope-o input-icon"></span>
                            </div><!-- end col-lg-6 -->

                            <div class="col-lg-6 col-sm-6 form-group">
                                <input class="form-control" type="text" name="phone" placeholder="Phone Number">
                                <span class="la la-phone input-icon"></span>
                            </div><!-- end col-lg-6 -->

                            <div class="col-lg-6 col-sm-6 form-group">
                                <input class="form-control" type="text" name="subject" placeholder="Subject">
                                <span class="la la-book input-icon"></span>
                            </div><!-- end col-lg-6 -->

                            <di                                  v class="col-lg-12 col-sm-12 form-group">
                                <textarea class="message-control form-control" name="message" placeholder="Write Message Here"></textarea>
                                <span class="la la-pencil input-icon"></span>
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <button class="theme-btn" type="submit">Send Message</button>
                            </div><!-- end col-md-12 -->
                        </div><!-- end row -->
                    </form>
                </div><!-- end contact-form-action -->
            </div><!-- end col-md-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end contact-area -->
<!-- ================================
       START CONTACT AREA
================================= -->


@endsection

@section('scripts')
<script src="{{url('home/js/gmap-script.js')}}"></script>
<script src="https://maps.google.com/maps/api/js?v=quarterly&language=en&key=AIzaSyDvwYEsIXbjzlpUz05eDPFqDVdOr6mZwV8&libraries=geometry%2Cplaces%2Cvisualization&"></script>
@stop('scripts')
