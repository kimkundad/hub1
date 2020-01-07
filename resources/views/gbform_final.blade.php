@extends('layouts.template')
@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{url('assets/datetimepicker-master/jquery.datetimepicker.css')}}"/>
<link href="{{url('home/icheck/skins/all.css?v=1.0.2')}}" rel="stylesheet">
<style>
.breadcrumb-area {
    background-image: url('{{url('assets/home/1920_450.png')}}');
}
.theme-payment-success-summary {
    list-style: none;
    margin: 0;
    padding: 0;
    font-size: 13px;
}
.theme-payment-success-summary > li {
    padding-bottom: 10px;
    margin-bottom: 10px;
    border-bottom: 1px dashed #d9d9d9;
    position: relative;
    color: #808080;
}
.theme-payment-success-summary > li > span {
    color: #4d4d4d;
    position: absolute;
    top: 0;
    right: 0;
    font-weight: bold;
}
</style>

@stop('stylesheet')
@section('content')




<!-- ================================
       START ERROR AREA
================================= -->
<section class="error-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="error-content ">

                  <form name="form" action="https://api.gbprimepay.com/v1/tokens/3d_secured" method="POST">
                    <div class="form-group col-md-12">
                      <label class=" control-label" for="profileFirstName">publicKey</label>
                     <input type="text" class="form-group" name="publicKey" value="{{$publicKey}}" />
                    </div>
                    <div class="form-group col-md-12">
                      <label class=" control-label" for="profileFirstName">gbpReferenceNo</label>
                     <input type="text" class="form-group" name="gbpReferenceNo" value="{{$gbpReferenceNo}}" />
                    </div>
                    <div class="form-group">
                      <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary border-none">  Pay </button>
                    </div>
                    </div>

                  </form>
                  <script>
                    window.onload=function(){
                      //document.forms["form"].submit();
                    }
                  </script>

                </div><!-- end error-content -->
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end error-area -->
<!-- ================================
       START ERROR AREA
================================= -->





@endsection

@section('scripts')




@stop('scripts')
