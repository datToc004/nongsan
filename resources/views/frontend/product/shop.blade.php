@extends('frontend.master')
@section('title', 'Cửa hàng')
@section('header')
@include('frontend.components.header2')
@stop
@section('content')
<section class="page-shop-slidebar" style="    padding-top: 60px;">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <img src="images/Product/1P.jpg" alt="product1" class="img-responsive" />
                <h3 style="font-size: 18px;font-weight: bold;margin-top: 30px;margin-bottom: 10px">Sản Phẩm
                </h3>
                <div class="box-fitter clearfix">
                    <div class="box-fitter-left">
                        <ul>
                            <li style="margin-right: 5px">
                                <a href="ProductGrid.html">
                                    <div><i class="la la-th-large"></i></div>
                                </a>
                            </li>
                            <li class="active">
                                <a href="ProductGroup.html">
                                    <div><i class="la la-list-ul"></i></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="box-fitter-right">
                        <ul>
                            <li>Sort by:</li>
                            <li>
                                <div class="dropdown filterDrop">
                                    <a class=" dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-expanded="false">
                                        Alphabetically, A-Z
                                        <span class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">USD</a></li>
                                        <li><a href="#">VND</a></li>
                                        <li><a href="#">EURO</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    @foreach ($sanpham as $item)
                        <div class="col-md-4">
                            <div class="productG ">
                                <div class="sizeImg" style="width: 100%; float: none">
                                    <a href="{{ route('product.getDetail', $item->id) }}">
                                        <img style="width:270px; height:300px" src="{!! asset('resources/upload/sanpham/' . $item->sanpham_anh) !!}"
                                            alt="product1" class="img-responsive" />
                                    </a>
                                    <a href="{{ route('product.getDetail', $item->id) }}">
                                        <div class="arrIcon"></div>
                                    </a>

                                    <div class="box-posi">HOT</div>
                                    <div class="arrIcon2">
                                        <ul>
                                            <li>
                                                <a href="{{ route('cart.addCart', $item->id) }}">
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
                                    <div class="sizeImgCalc"
                                        style="width: 100%;float: none;padding-left: 0;padding-bottom: 7px;">
                                        <h3>{{ $item->sanpham_ten }}</h3>
                                        <span style="text-decoration: line-through;"
                                            class="price1">{{ number_format($item->sanpham_gia, 0, '', ',') }}
                                            VNĐ</span>
                                        <h4>{{ number_format($giakm, 0, '', ',') }} VNĐ</h4>

                                    </div>
                                @else
                                    <div class="sizeImgCalc"
                                        style="width: 100%;float: none;padding-left: 0;padding-bottom: 7px;">
                                        <h3>{{ $item->sanpham_ten }}</h3>
                                        <h4>{{ number_format($item->sanpham_gia, 0, '', ',') }} VNĐ</h4>

                                    </div>
                                @endif

                            </div>
                        </div>
                    @endforeach


                </div>

                <div class="paginate">
                    <ul>
                        {!! $sanpham->appends($_GET)->links() !!}
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-md-pull-9">

                <div class=" slideSort">
                    <h3 class="slider-left-title">Xu hướng</h3>
                    <ul class="slide-left-list">
                        <li><a href="/nongsan/shop?xh=bc">Sản phẩm bán chạy</a></li>
                        <li><a href="/nongsan/shop?xh=km">Sản phẩm khuyến mãi</a></li>
                    </ul>
                </div>
                <div class="lineAbout" style="width: 100%;height: 1px"></div>
                <div class=" slideSort">
                    <h3 class="slider-left-title">Nhóm thực phẩm</h3>
                    <ul class="slide-left-list">
                        @foreach ($nhom as $item)
                            <li><a href="/nongsan/shop?nhom={{ $item->id }}">{{ $item->nhom_ten }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="lineAbout" style="width: 100%;height: 1px"></div>
                <div class="sidebar-filter-color">
                    <h3 class="slider-left-title">GIÁ</h3>
                    <div class="sidebar-box">
                        <form method="get" class="colorlib-form-2 filterForm">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="guests">Từ:</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="start" id="people" class="form-control">
                                                <option value="32000">32.000 VNĐ</option>
                                                <option value="200000">200.000 VNĐ</option>
                                                <option value="300000">300.000 VNĐ</option>
                                                <option value="500000">500.000 VNĐ</option>
                                                <option value="1000000">1.000.000 VNĐ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="guests">Đến:</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="end" id="people" class="form-control">
                                                <option value="2000000">2.000.000 VNĐ</option>
                                                <option value="4000000">4.000.000 VNĐ</option>
                                                <option value="6000000">6.000.000 VNĐ</option>
                                                <option value="8000000">8.000.000 VNĐ</option>
                                                <option value="10000000">10.000.000 VNĐ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" style="width: 100%;border: none;height: 40px;">Tìm kiếm</button>
                        </form>

                    </div>

                </div>
                <div class="lineAbout" style="width: 100%;height: 1px;    margin-top: 0;"></div>

                <div class="box-slider-left slideNewproduct slideNewproduct2">
                    <h3 class="slider-left-title">Bán chạy</h3>
                    @foreach ($sanphambc as $item)
                        <div class="box-slideNewproduct">
                            <div class="slideNewproduct-item slideNewproduct-img">
                                <a href="{{ route('product.getDetail', $item->id) }}"><img
                                        style="width:75px; height:75px" src="{!! asset('resources/upload/sanpham/' . $item->sanpham_anh) !!}" alt="product1"
                                        class="img-responsive" /></a>
                            </div>
                            <div class="slideNewproduct-item slideNewproduct-text">
                                <h5><a href="SingleProduct.html">{{ $item->sanpham_ten }}</a></h5>
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
                                    <span style="text-decoration: line-through; font-size: 10px;"
                                        class="price1">{{ number_format($item->sanpham_gia, 0, '', ',') }}
                                        VNĐ</span>
                                    <p class="slideProduct-price">
                                        {{ number_format($giakm, 0, '', ',') }} VNĐ</p>
                                @else
                                    <p class="slideProduct-price">
                                        {{ number_format($item->sanpham_gia, 0, '', ',') }} VNĐ</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
@stop

@section('script_shop')
<script>
    $('.filterForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var fullUrl = window.location.href;
        var finalUrl = fullUrl + "&" + formData;
        window.location.href = finalUrl;

    })
</script>

@stop
