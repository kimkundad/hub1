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
       START FAQ AREA
================================= -->
<section class="faq-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">

              <form action="https://api.gbprimepay.com/gbp/gateway/qrcode" name="gb_pay_auto" method="post">

                {{ csrf_field() }}
                 <input type="hidden" class="form-control" id="gb_pay3" name="amount" value="{{$master_price}}.00" readonly/>

                <input type="hidden" class="form-control" name="detail" value="money" />
                <input type="hidden" class="form-control" name="customerName" value="{{Auth::user()->name}}" />
                <input type="hidden" class="form-control" name="customerEmail" value="{{Auth::user()->email}}" />
                <input type="hidden" class="form-control" name="merchantDefined1" value="ซื้อ {{$objs->title_course}}" />
                <input type="hidden" class="form-control" name="merchantDefined2" value="{{$order_id}}" />

                <input type="hidden" class="form-control" name="referenceNo" value="{{date("Y")}}{{date("m")}}{{date("d")}}{{$rand}}" />
                <input type="hidden" name="token" value="m6n3qO4wQRGFdhO31DM7Jz5uuRW62Px/aV/EF1jl97EGJ4OmlaKTHcUyiJsByF3XHr0oGoRL86FelOAStzfonlbiJZeNmtP3uOmZEvpUYX9AkrlI9wcrwlRryvPQthZ0wVhR7oYypzZdO8AMVpwtXD0Nyns=" />
                <input type="hidden" name="payType" value="F" />

                <div class="form-group">
                  <div class="col-md-8">
                <button type="submit" class="btn btn-primary border-none"> ชำระผ่าน QR CODE </button>
                </div>
                </div>

              </form>


            </div><!-- end col-lg-8-->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end faq-area -->
<!-- ================================
       START FAQ AREA
================================= -->



@endsection

@section('scripts')

<script>
document.forms["gb_pay_auto"].submit();
</script>

@stop('scripts')
