@extends('frontend.master')
@section('title', 'Chi tiết sản phẩm')
@section('header')
@include('frontend.components.header2')
@stop
@section('content')
<section style="margin-top: 100px;margin-bottom: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div style="max-width: 470px">
                    <div class="image-preview-container">
                        <!-- - - - - - - - - - - - - - Image Preview Container - - - - - - - - - - - - - - - - -->
                        <div class="image-preview">
                            <a href="{!! asset('resources/upload/sanpham/' . $sanpham->sanpham_anh) !!}" data-zoom-image="{!! asset('resources/upload/sanpham/' . $sanpham->sanpham_anh) !!}"
                                data-fancybox="group">
                                <img style="width:470px;height:500px" id="zoom-image" src="{!! asset('resources/upload/sanpham/' . $sanpham->sanpham_anh) !!}"
                                    alt="">
                            </a>
                        </div>
                        <!--/ .image-preview-->
                        <!-- - - - - - - - - - - - - - End of Image Preview Container - - - - - - - - - - - - - - - - -->
                        <!-- - - - - - - - - - - - - - Thumbnails - - - - - - - - - - - - - - - - -->
                        <div class="carousel-type-2">
                            <div class="owl-carousel type-small product-thumbs" id="thumbnails" data-max-items="4">
                                @foreach ($hinhsanpham as $hinh)
                                    <a class="active" href="#" data-image="{!! asset('resources/upload/chitietsanpham/' . $hinh->hinhsanpham_ten) !!}"
                                        data-zoom-image="{!! asset('resources/upload/chitietsanpham/' . $hinh->hinhsanpham_ten) !!}">
                                        <img style="width:110px;height:110px" src="{!! asset('resources/upload/chitietsanpham/' . $hinh->hinhsanpham_ten) !!}" alt="">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <!-- - - - - - - - - - - - - - End of Thumbnails - - - - - - - - - - - - - - - - -->
                    </div>
                    <!--/ .image-preview-container -->
                </div>
            </div>
            <div class="col-md-6  clearfix">
                <div class="mid-product-content media-body">
                    <h3 style="font-size: 35px">{{ $sanpham->sanpham_ten }}</h3>
                    <p style="color: #000">Ký hiệu: {{ $sanpham->sanpham_ky_hieu }}</p>
                    <div class="notable clearfix">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                        </ul>
                        <p></p>
                    </div>
                    <!--/notable-->
                    <div class="details-desc" style="margin-top: 0">
                        <p>{!! $sanpham->sanpham_mo_ta !!}</p>
                    </div>
                    <div class="details-desc" style="margin-top: 0">
                        <p>Đơn vị :{!! $sanpham->donvitinh->donvitinh_ten !!}</p>
                    </div>
                    <?php
                    $tylegias = DB::select('select khuyenmai_phan_tram from sanpham as sp, sanphamkhuyenmai as spkm, khuyenmai as km where sp.id = spkm.sanpham_id and spkm.khuyenmai_id = km.id and sp.sanpham_khuyenmai = 1 and km.khuyenmai_tinh_trang = 1 and sp.id=' . $sanpham->id);
                    $giakm = $sanpham->sanpham_gia;
                    $tyle = 0;
                    foreach ($tylegias as $tylegia) {
                        $giakm -= $tylegia->khuyenmai_phan_tram * $sanpham->sanpham_gia * 0.01;
                        $tyle += $tylegia->khuyenmai_phan_tram * 0.01;
                    }
                    
                    ?>
                    <span class="details-price"> {{ number_format($giakm, 0, '', ',') }}
                        VNĐ</span>
                    <div class="lineAbout" style="width: 100%;height: 1px"></div>
                    <form action="{{ route('cart.addCart', $sanpham->id) }}" method="get">
                        <div class="details-button clearfix" style="margin-bottom: 0">
                            <div style="width: 50%;float: left">
                                <h3>Số lượng</h3>
                                <div class="pd-c-quantity quantity details-next">
                                    <input name="quantity" type="number" min="1" max="100" step="1" value="1">
                                    <div class="quantity-button quantity-down">
                                        <span class="step-next"><i class="la la-angle-down"></i></span>
                                    </div>
                                    <div class="quantity-button quantity-up">
                                        <span class="step-next"><i class="la la-angle-up"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-filter-color" style="width: 50%;float: left">
                                <h3>Chia sẻ:</h3>
                                <div class="share-link tags">
                                    <p class="tags-item"></p>
                                    <ul class="sku-nd">
                                        <li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" title=""><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" title=""><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="lineAbout" style="width: 100%;height: 1px;    margin-top: 15px;"></div>
                        <div class="addCart">
                            <ul>
                                <li>
                                    <button class="button btn-hover btn-details">Thêm vào giỏ hàng <i
                                            class="la la-shopping-cart"
                                            style="font-size: 20px;position: relative;top: 2px;"></i></button>
                                </li>
                                <li style="margin-left: 40px;">
                                    <i class="la la-heart-o" style="font-size: 20px;position: relative;top: 2px;"></i>
                                    Add
                                    to wishlist
                                </li>
                            </ul>
                        </div>
                        <input type="hidden" name="id_product" value="{{ $sanpham->id }}">
                    </form>

                    <div class="category_tag" style="margin-top: 20px">
                        <!--/share-link-->
                        <div class="category tags">
                            <p class="tags-item">Loại: </p>
                            <span><a href="#" class="sku-nd"
                                    style="font-size: 12px">{{ $sanpham->loaisanpham_ten }}</a></span>
                        </div>
                        <!--/category-->
                    </div>
                    <!--/category_tag-->
                </div>
                <!--/mid-product-content-->
            </div>

        </div>
    </div>
</section>
<section class="tabProduct">
    <div class="container">
        <div class="menuTabPro">
            <ul class="">
                <li class="active"><a data-toggle="tab" href="#home">Mô tả</a></li>
                <li>|</li>
                <li><a data-toggle="tab" href="#menu1">Thông tin thêm</a></li>
            </ul>
        </div>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active tabProText">
                <p>
                    {!! $sanpham->loaisanpham_mo_ta !!}
                </p>
            </div>
            <div id="menu1" class="tab-pane fade tabProText">
                <p>
                    {!! $sanpham->nhom_mo_ta !!}
                </p>

            </div>
        </div>
    </div>
</section>
<section class="page-shop-slidebar" style="    padding-top: 60px;">

</section>
@stop
