@extends('frontend.master')
@section('title', 'Liên lạc')
@section('header')
@include('frontend.components.header2')
@stop
@section('content')
<section class="myAcc contact">
    <div class="container">
        <div style="  width: calc(100% - 200px);margin: 0 auto">
            <div class="row">
                <div class="col-md-5">
                    <p>LIÊN HỆ</p>
                    <h3>THÔNG TIN</h3>
                </div>
                <div class="col-md-7">
                    <div class="clearfix info">
                        <div class="infoLeft"><b>ĐỊA CHỈ:</b></div>
                        <div class="infoRight">
                            <p>D29 Pham Van Bach Street, Cau Giay Districty, Ha Noi</p>
                        </div>
                    </div>
                    <div class="clearfix info">
                        <div class="infoLeft"><b>THƠI GIAN:</b></div>
                        <div class="infoRight">
                            <p>8 AM - 6 PM from Mon - Sun</p>
                        </div>
                    </div>
                    <div class="clearfix info">
                        <div class="infoLeft"><b>ĐIỆN THOẠI:</b></div>
                        <div class="infoRight">
                            <p>+(024) 272-9677</p>
                        </div>
                    </div>
                    <div class="clearfix info">
                        <div class="infoLeft"><b>Mail:</b></div>
                        <div class="infoRight">
                            <p style="border-bottom: 2px solid #c19b76;padding: 0 2.5px 0 2.5px;">Contact@Woody.co</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 70px">
                <div class="col-md-5">
                    <p>LIÊN HỆ</p>
                    <h3>Tìm trên bản đồ</h3>
                </div>
                <div class="col-md-7">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29795.220043156223!2d105.79019869859627!3d21.01657487191401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4d9a35c303%3A0x7ecd0a4796f16c82!2zVHLGsOG7nW5nIMSQw6BvIHThuqFvIE3hu7kgdGh14bqtdCDEkGEgcGjGsMahbmcgdGnhu4duIEFyZW5hIE11bHRpbWVkaWE!5e0!3m2!1svi!2s!4v1565684066189!5m2!1svi!2s"
                        width="80%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
