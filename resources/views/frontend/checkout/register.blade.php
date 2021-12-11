@extends('frontend.master')
@section('title', 'Đăng kí')
@section('header')
@include('frontend.components.header2')
@stop
@section('content')
<section class="myAcc myAcc2">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="myAccSidebar">
                    <li class="clearfix active" style=" border-top: 1px solid #d9d9d9;">
                        <a href="{{ route('customer.register') }}">
                            <p>ĐĂNG KÍ</p>
                            <i class="la la-user"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <h3 style="margin-bottom: 30px;text-align: left">ĐĂNG KÍ</h3>
                <form action="{{ route('customer.register.post') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="accInput">
                                <p>Tên</p>
                                <input type="text" name="txtUsername" class="inputText" placeholder="Nhập tên khách hàng">
                                {!! $errors->first('txtUsername') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="accInput">
                                <p>Email</p>
                                <input type="text" name="txtEmail" class="inputText" placeholder="Nhập địa chỉ email">
                                {!! $errors->first('txtEmail') !!}
                            </div>
                        </div>
                    </div>
                    <div class="accInput">
                        <p>Số Điện Thoại</p>
                        <input type="text" name="txtPhone" class="inputText" placeholder="Nhập số điện thoại">
                        {!! $errors->first('txtPhone') !!}
                    </div>
                    <div class="accInput">
                        <p>Địa Chỉ</p>
                        <input type="text" name="txtAddress" class="inputText" placeholder="Nhập địa chỉ">
                        {!! $errors->first('txtAddress') !!}
                    </div>
                    <div class="accInput">
                        <p>Mật Khẩu</p>
                        <input type="password" name="txtPass" class="inputText" placeholder="Nhập mật khẩu">
                        {!! $errors->first('txtPass') !!}
                    </div>
                    <div class="accInput">
                        <p>Nhập Lại Mật Khẩu</p>
                        <input type="password" name="txtRePass" class="inputText" placeholder="Nhập lại mật khẩu">
                        {!! $errors->first('txtRePass') !!}
                    </div>

                    <button class="viewMore" style="margin: 0;margin-top: 45px;">
                        <p>ĐĂNG KÍ</p>
                    </button>
                </form>

            </div>
        </div>
    </div>
</section>
@stop
