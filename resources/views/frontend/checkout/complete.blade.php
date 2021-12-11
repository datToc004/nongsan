@extends('frontend.master')
@section('title', 'Hoàn Thành')
@section('header')
@include('frontend.components.header2')
@stop
@section('content')
<section class="myAcc myAcc2">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="myAccSidebar">
                    <li class="clearfix active">
                        <a href="{{ route('complete.get') }}">
                            <p>Đơn hàng</p>
                            <i class="la la-shopping-cart"></i>
                        </a>
                    </li>
                    <li class="clearfix " style=" border-top: 1px solid #d9d9d9;">
                        <a href="{{ route('customer.account') }}">
                            <p>Tài khoản</p>
                            <i class="la la-user"></i>
                        </a>
                    </li>
                    <li class="clearfix">
                        <a href="{{ route('logout.customer') }}">
                            <p>Đăng xuất</p>
                            <i class="la la-sign-out"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <h3 style="margin-bottom: 30px;text-align: left">Đơn hàng</h3>
                <div class="panel-group" id="faqAccordion">
                    <?php $i = 1; ?>
                    @foreach ($donhang as $item)
                        @if ($i == 1)
                            <div class="panel panel-default faq-coat" style="border: none;    box-shadow: none;">
                                <div class="panel-heading faq-head bd-color-left-setting active" data-toggle="collapse"
                                    data-parent="#faqAccordion" data-target="#question0" aria-expanded="true"
                                    style="background: rgb(193, 155, 118);   ">
                                    <h4 class="panel-title">
                                        @if (date_default_timezone_set('Asia/Ho_Chi_Minh'))
                                            {!! date('d-m-Y', strtotime("$item->created_at")) !!}
                                        @endif
                                    </h4>
                                    <span class="accordion-toggle question-toggle collapsed"><i
                                            class="fa color-setting fa-minus" aria-hidden="true"></i></span>
                                    <p style="  position: absolute;
                                            right: 19px;
                                            top: 14px;
                                            font-size: 16px;
                                            color: #fff;">
                                        {{ number_format($item->donhang_don_gia, 0, '', ',') }}VNĐ</p>
                                </div>
                                <div id="question0" class="panel-collapse collapse in" aria-expanded="true" style="">
                                    <div class="panel-body " style=" background: #fff;padding: 30px">
                                        @foreach ($item->chitietDh as $chitiet)
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img style="width:110px;height:134px" src="{!! asset('resources/upload/sanpham/' . $chitiet->sanpham->sanpham_anh) !!}"
                                                        alt="product" class="img-responsive">
                                                </div>
                                                <div class="col-md-2" style="text-align: center;padding-top: 58px;">
                                                    {{ $chitiet->sanpham->sanpham_ten }}
                                                </div>
                                                <div class="col-md-2" style="text-align: right;padding-top: 58px;">
                                                    {{ number_format($chitiet->chitietdonhang_don_gia, 0, '', ',') }}VNĐ
                                                </div>
                                                <div class="col-md-2" style="text-align: right;padding-top: 50px;">
                                                    <div style="border-bottom: 1px solid rgb(193, 155, 118);
                                            width: 50px;
                                               font-weight: bold;
                                            text-align: center;
                                            float: right;
                                            padding-bottom: 10px;">
                                                        {{ $chitiet->chitietdonhang_so_luong }}
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="text-align: right;padding-top: 58px;">
                                                    {{ number_format($chitiet->chitietdonhang_don_gia*$chitiet->chitietdonhang_so_luong, 0, '', ',') }}VNĐ
                                                </div>
                                            </div>

                                            <div class="lineAbout" style="width: 100%;height: 1px;margin-top: 20px;">
                                            </div>
                                        @endforeach

                                    </div>


                                </div>
                            </div>
                        @else
                            <div class="panel panel-default faq-coat" style="border: none;    box-shadow: none;">
                                <div class="panel-heading faq-head bd-color-left-setting" data-toggle="collapse"
                                    data-parent="#faqAccordion" data-target="#question{{ $i }}">
                                    <h4 class="panel-title">
                                        @if (date_default_timezone_set('Asia/Ho_Chi_Minh'))
                                            {!! date('d-m-Y', strtotime("$item->created_at")) !!}
                                        @endif
                                    </h4>
                                    <span class=" accordion-toggle question-toggle collapsed"><i
                                            class="fa fa-plus color-setting" aria-hidden="true"></i></span>
                                    <p style="  position: absolute;
                                            right: 19px;
                                            top: 14px;
                                            font-size: 16px;
                                            color: #fff;">
                                        {{ number_format($item->donhang_don_gia, 0, '', ',') }}VNĐ</p>
                                </div>
                                <div id="question{{ $i }}" class="panel-collapse collapse ">
                                    <div class="panel-body " style=" background: #fff;padding: 30px">
                                        @foreach ($item->chitietDh as $chitiet)
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img style="width:110px;height:134px" src="{!! asset('resources/upload/sanpham/' . $chitiet->sanpham->sanpham_anh) !!}"
                                                        alt="product" class="img-responsive">
                                                </div>
                                                <div class="col-md-2" style="text-align: center;padding-top: 58px;">
                                                    {{ $chitiet->sanpham->sanpham_ten }}
                                                </div>
                                                <div class="col-md-2" style="text-align: right;padding-top: 58px;">
                                                    {{ number_format($chitiet->chitietdonhang_don_gia, 0, '', ',') }}VNĐ
                                                </div>
                                                <div class="col-md-2" style="text-align: right;padding-top: 50px;">
                                                    <div style="border-bottom: 1px solid rgb(193, 155, 118);
                                            width: 50px;
                                               font-weight: bold;
                                            text-align: center;
                                            float: right;
                                            padding-bottom: 10px;">
                                                        {{ $chitiet->chitietdonhang_so_luong }}
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="text-align: right;padding-top: 58px;">
                                                    {{ number_format($chitiet->chitietdonhang_don_gia*$chitiet->chitietdonhang_so_luong, 0, '', ',') }}VNĐ
                                                </div>
                                            </div>

                                            <div class="lineAbout" style="width: 100%;height: 1px;margin-top: 20px;">
                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                            </div>
                        @endif
                        <?php $i += 1; ?>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@stop
