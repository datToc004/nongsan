<header id="header" class="header-serviceV2 scollView">
    <div class="home-top" style="margin-top: 0">
        <div class="container">
            <div class="header-top clearfix">
                <div class="header-tleft pull-left">
                    <div class="link-list link-list-first">
                        <span>Chào mừng đến với cửa hàng woody!</span>
                    </div>
                </div>
                <div class="header-dropdown pull-right">
                    <div class="dropdown dp-iblock ">
                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-expanded="false">VN
                            <span class="fa fa-angle-down"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">VIETNAMESE</a></li>
                            <li><a href="#">ENGLISH</a></li>

                        </ul>
                    </div>
                    <div class="dropdown header-dropdown-br dp-iblock">
                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-expanded="false">VND
                            <span class="fa fa-angle-down"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">VND</a></li>
                            <li><a href="#">USD</a></li>
                            <li><a href="#">EURO</a></li>
                        </ul>
                    </div>
                    <div class="check-account dp-iblock">
                        @if (Auth::user())
                            <a href="{{ route('customer.account') }}" class="account link-color"
                                style="padding-left: 19px;padding-right: 10px;">{{ Auth::user()->name }}</a>
                                <a href="{{ route('cart.getCart') }}">Giỏ hàng: {{Cart::Content()->count()}}</a>
                        @else
                            <a href="{{ route('customer.login') }}" class="account link-color"
                                style="padding-left: 19px;padding-right: 10px;">Login</a>
                        @endif

                        
                    </div>
                </div>
                <!--                            <div class="header-tleft pull-right">-->
                <!--                                -->
                <!--                                <div class="link-list link-list-first">-->
                <!--                                    <span><i class="fa fa-phone" aria-hidden="true"></i>(88) 0111 223 445</span>-->
                <!--                                </div>-->
                <!--                                <div class="link-list ">-->
                <!--                                    <span><i class="fa fa-home" aria-hidden="true"></i>20 Green Farm, New Zealand</span>-->
                <!--                                </div>-->
                <!--                            </div>-->
            </div>
        </div>
    </div>
    @include('frontend.components.header_son')
    <div class="banner relative">
        <img src="images/15.png" alt="logo" class=" img-responsive">
        <div class="banner-arrival">
            <h3>@yield('title')</h3>
            <p>Trang chủ <i class="fa fa-angle-right" aria-hidden="true"></i> @yield('title')</p>
        </div>
    </div>
</header>
