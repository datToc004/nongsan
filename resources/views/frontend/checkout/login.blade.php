@extends('frontend.master')
@section('title', 'Login')
@section('header')
@include('frontend.components.header2')
@stop
@section('content')
<section class="myAcc">
    <div class="container">
        <div style="  width: calc(100% - 200px);margin: 0 auto">
            <h3>Login / register</h3>

            <div class="row" style="align-items: center;">
                <form id="my_form" action="{{ route('login.post.customer') }}" method="POST">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <div class="accInput">
                            <p>Username or Email Address *</p>
                            <input type="text" name="email" class="inputText" placeholder="Enter your username or email address">
                        </div>
                        <div class="accInput">
                            <p>Password *</p>
                            <input type="password" name="password"  class="inputText" placeholder="Enter your password">
                        </div>
                        <div class="btn-group style-checkbox" data-toggle="buttons">
                            <label class="btn btn-success default ">
                                <input type="checkbox" checked="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div><span style="position: relative;top: 1px;margin-left: 5px;">Remember me</span>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="javascript:{}" onclick="document.getElementById('my_form').submit();" style="color: #000" class="Brightness">
                                    <div class="btn-arrival" style="    margin-top: 25px;">
                                        <div>LOG IN <img src="images/arr.png" alt="logo"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('customer.register') }}" style="color: #000" class="Brightness">
                                    <div class="btn-arrival" style="    margin-top: 25px;">
                                        <div>REGISTER <img src="images/arr.png" alt="logo"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="accInput" style="margin-top: 50px">
                            <p> Or Login with Social Network</p>
                            <div class="follow-list-icon">
                                <div class="mr-icon2">
                                    <ul>
                                        <li><a href="#"><img src="images/facebook.png" alt="logo"></a></li>
                                        <li><a href="#"><img src="images/twitter.png" alt="logo"></a></li>
                                        <li><a href="#"><img src="images/google-plus.png" alt="logo"></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop
