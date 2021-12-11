@extends('frontend.master')
@section('title', 'Giỏ hàng')
@section('header')
@include('frontend.components.header2')
@stop
@section('content')
<section class="myAcc myAcc2">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach ($cart as $product)
                    <div class="row">
                        <div class="col-md-1" style="text-align: center;padding-top: 58px;">
                            <a onclick="return del_cart('{{ $product->name }}')" href="{{ route('cart.removeCart',$product->rowId ) }}"> <i class="la la-close" style="font-size: 20px;"></i></a>
                        </div>
                        <div class="col-md-2">
                            <img style="width:103px;height:126px" src="{!! asset('resources/upload/sanpham/' . $product->options->img) !!}" alt="product"
                                class="img-responsive">
                        </div>
                        <div class="col-md-2" style="text-align: center;padding-top: 58px;">
                            {{ $product->name }}
                        </div>
                        <div class="col-md-2" style="text-align: right;padding-top: 58px;">
                            {{ number_format($product->price, 0, '', ',') }}VNĐ
                        </div>

                        <div class="col-md-3" style="text-align: right;padding-top: 42px;">
                            <div class="cart-product-two shopping-cart-quantity cartConver">
                                <div class="pd-c-quantity quantity add-card add-card-product">
                                    <input onchange="update_qty('{{ $product->rowId }}',this.value)" type="number" min="1" max="100" step="1"
                                        style="border-bottom: 1px solid rgb(193, 155, 118);padding-bottom: 10px;"
                                        value="{{ $product->qty }}">
                                    <div class="quantity-button quantity-down">
                                        <span><i class="la la-minus"></i></span>
                                    </div>
                                    <div class="quantity-button quantity-up">
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1" style="text-align: right;padding-top: 58px;">
                            {{ number_format($product->price * $product->qty, 0, '', ',') }}VNĐ</div>
                    </div>
                    <div class="lineAbout" style="width: 100%;height: 1px;margin-top: 20px;"></div>
                @endforeach


            </div>
            <div class="col-md-4">
                <div class="form-tax">
                    <h4>đơn hàng</h4>
                    <div class="lineAbout" style="width: 100%;height: 1px;    margin-top: 20px;"></div>

                    <div class="box-formTax-total">
                        <div class="row">
                            <div class="col-md-6" style="font-size: 18px;font-weight: bold">Tổng</div>
                            <div class="col-md-6" style="text-align: right;font-size: 18px;font-weight: bold">{{ $total }}VNĐ
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('checkout') }}" class="btn-formTax">
                        <div>Tiến hành thanh toán</div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@stop
@section('script_cart')
<script>
    function del_cart(name) {
        return confirm('Bạn muốn xoá sản phẩm : ' + name + ' ?');
    }

    function update_qty(rowId, qty) {
        $.get('/nongsan/cart/updatecart/' + rowId + '/' + qty,
            function() {
                window.location.reload();
            }
        );
    }
</script>
@endsection
