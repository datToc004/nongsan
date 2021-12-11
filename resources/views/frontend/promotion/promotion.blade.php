@extends('frontend.master')
@section('title', 'Khuyến mãi')
@section('header')
@include('frontend.components.header2')
@stop
@section('content')
<section class="page-shop-slidebar">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                @foreach ($prom as $pr)
                    <div class="box-blog">
                        <div class="box-opa">
                            <img style="width:860px;height:340px" src="{!! asset('resources/upload/khuyenmai/' . $pr->khuyenmai_anh) !!}" alt="product1"
                                class="img-responsive" />

                            <a href="{{ route('promotion.detail.get',$pr->id) }}">
                                <div class="header-position-one" style="width: 100% !important;"></div>
                            </a>

                        </div>
                        <a href="{{ route('promotion.detail.get',$pr->id) }}">
                            <h3 style="margin-top: 30px;    margin-bottom: 10px;">
                                {{ $pr->khuyenmai_tieu_de }}
                            </h3>
                        </a>
                        <p>{{ date('d/m/Y', strtotime("$pr->khuyenmai_time_start")) }}</p>
                        <div class="lineAbout" style="width: 80px;height: 1px;margin-top: 20px;"></div>
                        <p style="    margin-bottom: 15px;">{!! $pr->khuyenmai_noi_dung !!}
                        </p>

                    </div>
                @endforeach
            </div>
            <div class="col-md-3 col-md-pull-9">
                <div class="slidebar-left">
                    <div class="input-group input-slider" style="    width: 100%;
                                                 position: relative;">

                        <input type="text" class="form-control" placeholder="Search" style="    border-radius: 20px;
                                            padding-top: 7px;
                                            height: 40px;
                                            padding-right: 49px;    border-color: #a8a8a8;">
                        <a href="#">
                            <img src="images/Group/search.jpg" alt="img" style="    position: absolute;
                                            right: 21px;
                                            z-index: 99;
                                            top: 11px;">
                        </a>
                    </div><!-- /input-group -->
                    <div class="lineAbout" style="width: 100%;height: 1px"></div>

                    <div class="box-slider-left slideNewproduct">
                        <h3 class="slider-left-title">Khuyến mãi</h3>
                        @foreach ($prom as $pr)
                            <div class="box-slideNewproduct">
                                <div class="slideNewproduct-item slideNewproduct-img">
                                    <a href="{{ route('promotion.detail.get',$pr->id) }}"><img style="width:75px;height:73px"
                                            src="{!! asset('resources/upload/khuyenmai/' . $pr->khuyenmai_anh) !!}" alt="product1" class="img-responsive" /></a>
                                </div>
                                <div class="slideNewproduct-item slideNewproduct-text">
                                    <h5><a
                                            href="{{ route('promotion.detail.get',$pr->id) }}">{!! substr($pr->khuyenmai_noi_dung, 0, 40) . '...' !!}</a>
                                    </h5>
                                    <p class="slideProduct-price">
                                        {{ date('d/m/Y', strtotime("$pr->khuyenmai_time_start")) }}</p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="box-slider-left slideBanner">
                        <a href="#"><img src="images/Group/RP4.png" alt="banner slideBar"
                                class="img-responsive" /></a>
                    </div>
                    <div class="lineAbout" style="width: 100%;height: 1px"></div>

                    <div class="box-slider-left slideTag">
                        <h3 class="slider-left-title">Tags</h3>
                        <ul class="slideTag-list">
                            <li><a href="#">Natural</a></li>
                            <li><a href="#">Wooden</a></li>
                            <li><a href="#">Decor</a></li>
                            <li><a href="#">Decor</a></li>
                            <li><a href="#">Woody</a></li>
                            <li><a href="#">Natural</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
