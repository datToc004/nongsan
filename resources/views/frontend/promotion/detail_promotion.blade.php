@extends('frontend.master')
@section('title', 'Chi tiết khuyến mãi')
@section('header')
@include('frontend.components.header2')
@stop
@section('content')
<section class="singleBlog">
    <div class="container">
        <div style="margin-top: 70px;margin-bottom: 30px">

        </div>
        <div style=" width: calc(100% - 200px);margin: 0 auto">
            <h1 style="color: #000">{{ $prom->khuyenmai_tieu_de }} / <span
                    style="font-size: 12px;color: #898989">{{ date('d/m/Y', strtotime("$prom->khuyenmai_time_start")) }}</span>
            </h1>
            <div class="lineAbout" style="width: 80px;height: 1px"></div>
            <div class="signleContent">
                <p>{!! $prom->khuyenmai_noi_dung !!}</p>
                <div>
                    <img style="width:970px;height:450px" src="{!! asset('resources/upload/khuyenmai/' . $prom->khuyenmai_anh) !!}" alt="logo"
                        class=" img-responsive">
                </div>
                <h3 style="margin-top: 20px">Thời gian: {{ date('d/m/Y', strtotime("$prom->khuyenmai_time_start")) }}
                    -
                    {{ date('d/m/Y', strtotime("$prom->khuyenmai_time_start" . "+ $prom->khuyenmai_thoi_gian  day")) }}
                </h3>
                <h3 style="margin-top: 20px">Khuyến mãi: {{ $prom->khuyenmai_phan_tram }}%
                </h3>
                <p>{!! $prom->khuyenmai_noi_dung !!}</p>
            </div>

        </div>
        <div class="lineAbout" style="width: 100%;height: 1px"></div>
        <div class="clearfix">
            <div style="float: left">
                <ul class="slideTag-list">
                    <li><a href="#">Natural</a></li>
                    <li><a href="#">Wooden</a></li>
                    <li><a href="#">Decor</a></li>
                </ul>
            </div>
            <div class="mr-icon iconSign" style="float: right;width: 167px">
                <ul>
                    <li style="width: 60px;color: #898989;margin-right: 20px;">Chia sẻ: </li>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
</section>
<section class="latest-product">
    <div class="container">
        <div class="latest-product-title title-text">
            <h3>SẢN PHẨM</h3>
            <p>Sản phẩm đang được giảm giá theo trương trình khuyến mãi</p>
        </div>
        <div class="detail-navtab latest-product-tab">
            <ul class="nav nav-pills nav-justified">
                <li class="active"><a data-toggle="pill" href="#sellers" class="color-setting"></a></li>
            </ul>
            <div class="tab-content detail-tab">

                <div id="sellers" class="tab-pane fade  active in">
                    <div class="row product-gird">
                        @foreach ($prom->sanpham as $sp)
                            <div class="col-xs-6 col-sm-3">
                                <div class="product-item productG" style="margin-top: 0">
                                    <div class="product-image sizeImg" style="height: 100%">
                                        <img style="width:270px;height:330px" src="{!! asset('resources/upload/sanpham/' . $sp->sanpham_anh) !!}"
                                            alt="product" class="product-img-first img-responsive">
                                        <div class="arrIcon"></div>
                                        <div class="box-posi">SALE</div>
                                        <div class="arrIcon2">
                                            <ul>
                                                <li>
                                                    <a href="#">

                                                        <i class="la la-shopping-cart"></i>
                                                    </a>
                                                </li>
                                                <li style="margin-left: 6px;margin-right: 6px;">
                                                    <a href="SingleProduct.html">


                                                        <i class="la la-eye"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">

                                                        <i class="la la-heart-o"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-text clearfix">
                                        <div class="product-left pull-left"
                                            style="padding-top: 20px;padding-bottom: 15px;">
                                            <div class="product-name">
                                                <h3 class="product-title">
                                                    <a href="#" class="color-setting">{{ $sp->sanpham_ten }}</a>

                                                </h3>
                                            </div>
                                            <div class="product-price">


                                                <?php
                                                $tylegias = DB::select('select khuyenmai_phan_tram from sanpham as sp, sanphamkhuyenmai as spkm, khuyenmai as km where sp.id = spkm.sanpham_id and spkm.khuyenmai_id = km.id and sp.sanpham_khuyenmai = 1 and km.khuyenmai_tinh_trang = 1 and sp.id=' . $sp->id);
                                                $giakm = $sp->sanpham_gia;
                                                $tyle = 0;
                                                foreach ($tylegias as $tylegia) {
                                                    $giakm -= $tylegia->khuyenmai_phan_tram * $sp->sanpham_gia * 0.01;
                                                    $tyle += $tylegia->khuyenmai_phan_tram * 0.01;
                                                }
                                                
                                                ?>
                                                <span
                                                    class="price1">{{ number_format($sp->sanpham_gia, 0, '', ',') }}
                                                    VNĐ</span>
                                                <span class="price">{{ number_format($giakm, 0, '', ',') }}</span>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /product-item -->
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="" style="width: 136px; height: 42px;">

                </div>
            </a>
        </div>
    </div>
</section>
@stop
