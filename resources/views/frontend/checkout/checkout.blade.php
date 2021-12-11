@extends('frontend.master')
@section('title', 'checkout')
@section('header')
@include('frontend.components.header2')
@stop
@section('content')
<section class="myAcc myAcc2">
    <form id="my_form" action="{{ route('checkout.post') }}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 style="margin-bottom: 30px;text-align: left">Thông tin giao hàng</h3>
                    {{-- <p style="  position: absolute;
                                            right: 19px;
                                            top: 4px;
                                            font-size: 16px;
                                            color: #000;" class="use-default"><i class="la la-map-o"></i> Use Default
                </p> --}}
                    <div class="accInput">
                        <p>Họ và tên</p>
                        <input type="text" name="txtName" class="inputText" placeholder="Điền họ và tên">
                    </div>
                    <div class="accInput">
                        <p>Email</p>
                        <input type="text" name="txtEmail" class="inputText" placeholder="Điền email">
                    </div>
                    <div class="accInput">
                        <p>Địa chỉ</p>
                        <input type="text" name="txtAddress" class="inputText" placeholder="Enter your password">
                    </div>
                    <div class="accInput">
                        <p>Số điện thoại *</p>
                        <input type="text" name="txtPhone" class="inputText" placeholder="Enter your password">
                    </div>
                    <a href="#" style="" class="trash">
                        <div style="font-size: 16px;float: right;"><i class="la la-trash"></i> xóa hết</div>
                    </a>
                    <h3 style="margin-bottom: 30px;text-align: left;    margin-top: 100px;">Thông tin thêm</h3>
                    <div class="accInput">
                        <input type="text" name="txtNote" class="inputText" placeholder="Thêm ghi chú">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-tax">
                        <h4>Đơn hàng</h4>
                        <div class="lineAbout" style="width: 100%;height: 1px;    margin-top: 20px;"></div>
                        <div class="box-formTax-content">
                            @foreach ($cart as $product)
                                <div class="row">
                                    <div class="col-md-5">{{ $product->name }}</div>
                                    <div class="col-md-3" style="text-align: center;">{{ $product->qty }}</div>
                                    <div class="col-md-4" style="text-align: right;">
                                        {{ number_format($product->price * $product->qty, 0, '', ',') }}VNĐ</div>
                                </div>
                            @endforeach
                        </div>
                        <div class="lineAbout" style="width: 100%;height: 1px;    margin-top: 20px;"></div>
                        <div class="box-formTax-total">
                            <div class="row">
                                <div class="col-md-6" style="font-size: 18px;font-weight: bold">Tổng tiền</div>
                                <div class="col-md-6" style="text-align: right;font-size: 18px;font-weight: bold">
                                    {{ $total }}VNĐ
                                </div>
                            </div>
                        </div>
                        <a href="javascript:{}" onclick="document.getElementById('my_form').submit();"
                            class="btn-formTax">
                            <div>ĐẶT HÀNG</div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </form>
</section>
@stop
