@extends('frontend.master')
@section('title', 'Home')
@section('header')
@include('frontend.components.header')
@stop
@section('content')
<section class="kitchen-box">
    <div class="container ">
        <div class="row" style="margin-bottom: 30px">
            <div class="col-md-6 relative">
                <div class="box-text">
                    <div class="title-text2">
                        <h3 style="text-transform:uppercase; ">{{ $loaisp->get(0)->loaisanpham_ten }}</h3>

                    </div>
                    <div class="text-center box-text-p">

                        <p>{!! substr($loaisp->get(0)->loaisanpham_mo_ta, 0, 200) . '...' !!}</p>
                    </div>
                </div>
                <img style="width:570px;height:251px;" src="{!! asset('resources/upload/loaisanpham/' . $loaisp->get(0)->loaisanpham_anh) !!}" alt="logo" class=" img-responsive">
                <div class="header-position"></div>
            </div>
            <div class="col-md-3 relative">
                <div class="box-text">
                    <div class="title-text2">
                        <h3 style="text-transform:uppercase;">{{ $loaisp->get(1)->loaisanpham_ten }}</h3>

                    </div>
                    <div class="text-center box-text-p">
                        <p>{!! substr($loaisp->get(1)->loaisanpham_mo_ta, 0, 100) . '...' !!}</p>
                    </div>
                </div>
                <img style="width:270px;height:250px" src="{!! asset('resources/upload/loaisanpham/' . $loaisp->get(1)->loaisanpham_anh) !!}" alt="logo" class=" img-responsive">

                <div class="header-position"></div>
            </div>
            <div class="col-md-3 relative">
                <div class="box-text">
                    <div class="title-text2">
                        <h3 style="text-transform:uppercase;">{{ $loaisp->get(2)->loaisanpham_ten }}</h3>

                    </div>
                    <div class="text-center box-text-p">
                        <p>{!! substr($loaisp->get(2)->loaisanpham_mo_ta, 0, 50) . '...' !!}</p>
                    </div>
                </div>
                <img style="width:270px;height:250px" src="{!! asset('resources/upload/loaisanpham/' . $loaisp->get(3)->loaisanpham_anh) !!}" alt="logo" class=" img-responsive">

                <div class="header-position"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 relative">
                <div class="box-text">
                    <div class="title-text2">
                        <h3 style="text-transform:uppercase;">{{ $loaisp->get(3)->loaisanpham_ten }}</h3>

                    </div>
                    <div class="text-center box-text-p">
                        <p>{!! substr($loaisp->get(3)->loaisanpham_mo_ta, 0, 60) . '...' !!}</p>
                    </div>
                </div>
                <img style="width:270px;height:250px" src="{!! asset('resources/upload/loaisanpham/' . $loaisp->get(3)->loaisanpham_anh) !!}" alt="logo" class=" img-responsive">

                <div class="header-position"></div>
            </div>
            <div class="col-md-3 relative">
                <div class="box-text">
                    <div class="title-text2">
                        <h3 style="text-transform:uppercase;">{{ $loaisp->get(4)->loaisanpham_ten }}</h3>

                    </div>
                    <div class="text-center box-text-p">
                        <p>{!! substr($loaisp->get(4)->loaisanpham_mo_ta, 0, 70) . '...' !!}</p>
                    </div>
                </div>
                <img style="width:270px;height:250px" src="{!! asset('resources/upload/loaisanpham/' . $loaisp->get(4)->loaisanpham_anh) !!}" alt="logo" class=" img-responsive">

                <div class="header-position"></div>
            </div>
            <div class="col-md-6 relative">
                <div class="box-text">
                    <div class="title-text2">
                        <h3 style="text-transform:uppercase;">{{ $loaisp->get(5)->loaisanpham_ten }}</h3>

                    </div>
                    <div class="text-center box-text-p">

                        <p>{!! substr($loaisp->get(5)->loaisanpham_mo_ta, 0, 220) . '...' !!}</p>
                    </div>
                </div>
                <img style="width:570px;height:251px" src="{!! asset('resources/upload/loaisanpham/' . $loaisp->get(5)->loaisanpham_anh) !!}" alt="logo" class=" img-responsive">
                <div class="header-position"></div>
            </div>
        </div>
    </div>
</section>
<section class="latest-product">
    <div class="container">
        <div class="latest-product-title title-text">
            <h3>sẢN PHẨM</h3>
            <p>Hãy tin tưởng và lựa chọn chọn chúng tôi vì nó luân đúng</p>
        </div>
        <div class="detail-navtab latest-product-tab">
            <ul class="nav nav-pills nav-justified">
                <li class="active"><a data-toggle="pill" href="#all" class="color-setting">Bán chạy</a></li>
                <li class=""><a data-toggle="pill" href="#sellers" class="color-setting">Khuyến mãi</a></li>
            </ul>
            <div class="tab-content detail-tab">
                <div id="all" class="tab-pane fade  active in">
                    <div class="row product-gird">
                        @foreach ($sanphambc as $item)
                            <div class="col-xs-6 col-sm-3">
                                <div class="product-item productG" style="margin-top: 0">
                                    <div class="product-image sizeImg" style="height: 100%">
                                        <img style="width:270px; height:300px" src="{!! asset('resources/upload/sanpham/' . $item->sanpham_anh) !!}"
                                            alt="product" class="product-img-first img-responsive">
                                        <div class="arrIcon"></div>
                                        <div class="box-posi">HOT</div>
                                        <div class="arrIcon2">
                                            <ul>
                                                <li>
                                                    <a href="Cart.html">

                                                        <i class="la la-shopping-cart"></i>
                                                    </a>
                                                </li>
                                                <li style="margin-left: 6px;margin-right: 6px;">
                                                    <a href="{{ route('product.getDetail', $item->id) }}">

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
                                                    <a href="{{ route('product.getDetail', $item->id) }}"
                                                        class="color-setting">{{ $item->sanpham_ten }}</a>
                                                </h3>
                                            </div>
                                            @if ($item->sanpham_khuyenmai == 1)
                                                <?php
                                                $tylegias = DB::select('select khuyenmai_phan_tram from sanpham as sp, sanphamkhuyenmai as spkm, khuyenmai as km where sp.id = spkm.sanpham_id and spkm.khuyenmai_id = km.id and sp.sanpham_khuyenmai = 1 and km.khuyenmai_tinh_trang = 1 and sp.id=' . $item->id);
                                                $giakm = $item->sanpham_gia;
                                                $tyle = 0;
                                                foreach ($tylegias as $tylegia) {
                                                    $giakm -= $tylegia->khuyenmai_phan_tram * $item->sanpham_gia * 0.01;
                                                    $tyle += $tylegia->khuyenmai_phan_tram * 0.01;
                                                }
                                                
                                                ?>
                                                <div class="product-price">
                                                    <span
                                                        class="price1">{{ number_format($item->sanpham_gia, 0, '', ',') }}
                                                        VNĐ</span>
                                                    <span class="price">{{ number_format($giakm, 0, '', ',') }}
                                                        VNĐ</span>
                                                </div>
                                            @else
                                                <div class="product-price">
                                                    <span
                                                        class="price">{{ number_format($item->sanpham_gia, 0, '', ',') }}
                                                        VNĐ</span>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- /product-item -->
                    </div>
                </div>
                <div id="sellers" class="tab-pane fade">
                    <div class="row product-gird">
                        @foreach ($sanphamkm as $item)
                            <div class="col-xs-6 col-sm-3">
                                <div class="product-item productG" style="margin-top: 0">
                                    <div class="product-image sizeImg" style="height: 100%">
                                        <img style="width:270px; height:300px" src="{!! asset('resources/upload/sanpham/' . $item->sanpham_anh) !!}"
                                            alt="product" class="product-img-first img-responsive">
                                        <div class="arrIcon"></div>
                                        <div class="box-posi">SELL</div>
                                        <div class="arrIcon2">
                                            <ul>
                                                <li>
                                                    <a href="Cart.html">

                                                        <i class="la la-shopping-cart"></i>
                                                    </a>
                                                </li>
                                                <li style="margin-left: 6px;margin-right: 6px;">
                                                    <a href="{{ route('product.getDetail', $item->id) }}">

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
                                                    <a href="{{ route('product.getDetail', $item->id) }}"
                                                        class="color-setting">{{ $item->sanpham_ten }}</a>
                                                </h3>
                                            </div>
                                            @if ($item->sanpham_khuyenmai == 1)
                                                <?php
                                                $tylegias = DB::select('select khuyenmai_phan_tram from sanpham as sp, sanphamkhuyenmai as spkm, khuyenmai as km where sp.id = spkm.sanpham_id and spkm.khuyenmai_id = km.id and sp.sanpham_khuyenmai = 1 and km.khuyenmai_tinh_trang = 1 and sp.id=' . $item->id);
                                                $giakm = $item->sanpham_gia;
                                                $tyle = 0;
                                                foreach ($tylegias as $tylegia) {
                                                    $giakm -= $tylegia->khuyenmai_phan_tram * $item->sanpham_gia * 0.01;
                                                    $tyle += $tylegia->khuyenmai_phan_tram * 0.01;
                                                }
                                                
                                                ?>
                                                <div class="product-price">
                                                    <span
                                                        class="price1">{{ number_format($item->sanpham_gia, 0, '', ',') }}
                                                        VNĐ</span>
                                                    <span class="price">{{ number_format($giakm, 0, '', ',') }}
                                                        VNĐ</span>
                                                </div>
                                            @else
                                                <div class="product-price">
                                                    <span
                                                        class="price">{{ number_format($item->sanpham_gia, 0, '', ',') }}
                                                        VNĐ</span>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog">
    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-md-6 relative">
                <img src="images/hp2.4.jpg" alt="logo" class=" img-responsive">
                <div class="arrival">
                    <a href="#" style="color: #000" class="Brightness">
                        <div class="btn-arrival">
                            <div>SHOP NOW <img src="images/arr.png" alt="logo"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 relative">
                <img src="images/hp2.5.jpg" alt="logo" class=" img-responsive">
                <div class="arrival">
                    <a href="#" style="color: #000" class="Brightness">
                        <div class="btn-arrival">
                            <div>SHOP NOW <img src="images/arr.png" alt="logo"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="slideBox2 slide-text slide-home-serviceV2 slide-text-color" style="position: relative;margin-top: 30px">
    <div class="latest-product-title title-text" style="

                position: absolute;
                z-index: 9999999;
                transform: translate(50%,-50%);
                right: 50%;
                top: 85px;">
        <h3>PHƯƠNG CHÂM PHỤC VỤ</h3>
        <p>Tổng hợp các phương châm phục vụ của web</p>
    </div>
    <div class="slider-headerrevo revo-v1 skew-slide">
        <div id="home-serviceV2" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
            <ul>
                <li data-transition="fade" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"
                    data-easein="Power4.easeInOut" class="item-1 slide-service slide-serviceV2">
                    <img src="images/hp3.1.jpg" alt="" data-bgposition="center center" data-bgfit="cover"
                        data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg img-responsive"
                        data-no-retina>
                    <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme bg-serviceV2"
                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                        data-y="['top','top','top','top']" data-voffset="['62','62','62','52']"
                        data-height="['320','320','380','400']" data-width="['970','970','740','540']"
                        data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1400,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                    </div>
                    <h2 class="tp-caption tp-resizeme slider-geeting"
                        data-frames="[{&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;speed&quot;:1500,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:900,&quot;ease&quot;:&quot;Power4.easeOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:500,&quot;to&quot;:&quot;y:-50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power2.easeIn&quot;}]"
                        data-x="['center']" data-hoffset="['0', '0', '0', '0']" data-y="['middle']"
                        data-voffset="['-42']"><img src="images/hp3.2.png" alt="Home_Store_V2"></h2>
                    <h3 class="tp-caption tp-resizeme slider-geeting" style="color: #c19876"
                        data-frames="[{&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;speed&quot;:1500,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:900,&quot;ease&quot;:&quot;Power4.easeOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:500,&quot;to&quot;:&quot;y:-50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power2.easeIn&quot;}]"
                        data-fontsize="['60','60','60','40']" data-x="['center']" data-hoffset="['0', '0', '0', '0']"
                        data-y="['middle']" data-voffset="['173']">
                        {{ $nhanvien->get(1)->nhanvien_ten }}</h3>
                    <h4 class="tp-caption tp-resizeme slider-geeting"
                        data-frames="[{&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;speed&quot;:1500,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:900,&quot;ease&quot;:&quot;Power4.easeOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:500,&quot;to&quot;:&quot;y:-50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power2.easeIn&quot;}]"
                        data-fontsize="['60','60','60','40']" data-x="['center']" data-hoffset="['0', '0', '0', '0']"
                        data-y="['middle']" data-voffset="['203']">Quản trị viên</h4>
                    <p class="tp-caption tp-resizeme slider-content"
                        data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                        data-x="['center']" data-hoffset="['0', '0', '0', '0']" data-y="['middle']"
                        data-voffset="['110']" data-width="['850','850','650','450']" data-height="none"
                        data-whitespace="normal" data-textAlign="['center']">
                        Chúng tôi cam kết mang đến cho Quý khách hàng dịch vụ CHẤT LƯỢNG <br>
                        ,nói không với hàng kém chất lượng.
                    </p>
                </li>
                <li data-transition="fade" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"
                    data-easein="Power4.easeInOut" class="item-2 slide-service slide-serviceV2">
                    <img src="images/hp3.1.jpg" alt="" data-bgposition="center center" data-bgfit="cover"
                        data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg img-responsive"
                        data-no-retina>
                    <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme bg-serviceV2"
                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                        data-y="['top','top','top','top']" data-voffset="['62','62','62','52']"
                        data-height="['320','320','380','400']" data-width="['970','970','740','540']"
                        data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1400,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                    </div>
                    <h2 class="tp-caption tp-resizeme slider-geeting"
                        data-frames="[{&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;speed&quot;:1500,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:900,&quot;ease&quot;:&quot;Power4.easeOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:500,&quot;to&quot;:&quot;y:-50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power2.easeIn&quot;}]"
                        data-x="['center']" data-hoffset="['0', '0', '0', '0']" data-y="['middle']"
                        data-voffset="['-42']"><img src="images/hp3.2.png" alt="Home_Store_V2"></h2>
                    <h3 class="tp-caption tp-resizeme slider-geeting" style="color: #c19876"
                        data-frames="[{&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;speed&quot;:1500,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:900,&quot;ease&quot;:&quot;Power4.easeOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:500,&quot;to&quot;:&quot;y:-50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power2.easeIn&quot;}]"
                        data-fontsize="['60','60','60','40']" data-x="['center']" data-hoffset="['0', '0', '0', '0']"
                        data-y="['middle']" data-voffset="['173']">
                        {{ $nhanvien->get(1)->nhanvien_ten }}</h3>
                    <h4 class="tp-caption tp-resizeme slider-geeting"
                        data-frames="[{&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;speed&quot;:1500,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:900,&quot;ease&quot;:&quot;Power4.easeOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:500,&quot;to&quot;:&quot;y:-50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power2.easeIn&quot;}]"
                        data-fontsize="['60','60','60','40']" data-x="['center']" data-hoffset="['0', '0', '0', '0']"
                        data-y="['middle']" data-voffset="['203']">Quản trị viên</h4>
                    <p class="tp-caption tp-resizeme slider-content"
                        data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                        data-x="['center']" data-hoffset="['0', '0', '0', '0']" data-y="['middle']"
                        data-voffset="['110']" data-width="['850','850','650','450']" data-height="none"
                        data-whitespace="normal" data-textAlign="['center']">
                        Chúng tôi cam kết mang đến cho Quý khách hàng dịch vụ TRUNG THỰC <br>
                        ,nói không với thiếu trung thực.
                    </p>
                </li>
                <li data-transition="fade" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"
                    data-easein="Power4.easeInOut" class="item-3 slide-service slide-serviceV2">
                    <img src="images/hp3.1.jpg" alt="" data-bgposition="center center" data-bgfit="cover"
                        data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg img-responsive"
                        data-no-retina>
                    <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme bg-serviceV2"
                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                        data-y="['top','top','top','top']" data-voffset="['62','62','62','52']"
                        data-height="['320','320','380','400']" data-width="['970','970','740','540']"
                        data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1400,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                    </div>
                    <h2 class="tp-caption tp-resizeme slider-geeting"
                        data-frames="[{&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;speed&quot;:1500,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:900,&quot;ease&quot;:&quot;Power4.easeOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:500,&quot;to&quot;:&quot;y:-50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power2.easeIn&quot;}]"
                        data-x="['center']" data-hoffset="['0', '0', '0', '0']" data-y="['middle']"
                        data-voffset="['-42']"><img src="images/hp3.2.png" alt="Home_Store_V2"></h2>
                    <h3 class="tp-caption tp-resizeme slider-geeting" style="color: #c19876"
                        data-frames="[{&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;speed&quot;:1500,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:900,&quot;ease&quot;:&quot;Power4.easeOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:500,&quot;to&quot;:&quot;y:-50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power2.easeIn&quot;}]"
                        data-fontsize="['60','60','60','40']" data-x="['center']" data-hoffset="['0', '0', '0', '0']"
                        data-y="['middle']" data-voffset="['173']">
                        {{ $nhanvien->get(1)->nhanvien_ten }}</h3>
                    <h4 class="tp-caption tp-resizeme slider-geeting"
                        data-frames="[{&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;speed&quot;:1500,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:900,&quot;ease&quot;:&quot;Power4.easeOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:500,&quot;to&quot;:&quot;y:-50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power2.easeIn&quot;}]"
                        data-fontsize="['60','60','60','40']" data-x="['center']" data-hoffset="['0', '0', '0', '0']"
                        data-y="['middle']" data-voffset="['203']">Quản trị viên</h4>
                    <p class="tp-caption tp-resizeme slider-content"
                        data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                        data-x="['center']" data-hoffset="['0', '0', '0', '0']" data-y="['middle']"
                        data-voffset="['110']" data-width="['850','850','650','450']" data-height="none"
                        data-whitespace="normal" data-textAlign="['center']">
                        Chúng tôi cam kết mang đến cho Quý khách hàng dịch vụ CÓ TRÁCH NHIỆM <br>
                        trong tất cả các khâu.
                    </p>
                </li>
            </ul>
            <div class="tp-bannertimer styleSlideV2"></div>

        </div>
    </div>
</section>
<section class="trademark trademarkV2 clearfix">
    <div class="container">
        <div class="trademark-listV2 owl-carousel owl-loaded">
            <a href="#"><img src="images/hp5.1.png" alt="Home_Portfolio5" class="img-responsive" /></a>
            <a href="#"><img src="images/hp5.2.png" alt="Home_Portfolio5" class="img-responsive" /></a>
            <a href="#"><img src="images/hp5.3.png" alt="Home_Portfolio5" class="img-responsive" /></a>
            <a href="#"><img src="images/hp5.4.png" alt="Home_Portfolio5" class="img-responsive" /></a>
            <a href="#"><img src="images/hp5.5.png" alt="Home_Portfolio5" class="img-responsive" /></a>
            <a href="#"><img src="images/hp5.6.png" alt="Home_Portfolio5" class="img-responsive" /></a>
        </div>
    </div>

</section>
@stop
