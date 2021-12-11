<div class="home-menu">
    <nav class="navbar-core navbar-white navbar-v1 headroom headroom--not-bottom headroom--pinned headroom--top">
        <div class="s-wrapper s-wrapper-service">
            <div class="container">
                <div class="s-inner clearfix">
                    <div class="pull-left nav-left">
                        <div class="logo">
                            <a href="Home.html">
                                <img src="images/logo.png" alt="logo" class=" img-responsive">
                            </a>
                        </div>
                    </div>
                    <button class="hamburger has-animation hamburger--collapse" id="toggle-icon">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                    <div class="pull-right nav-right">
                        <div class="navbar-main">
                            <ul class="navbar-menu">
                                <li class="dropdown">
                                    <a href="{{ route('home.customer') }}">TRANG CHỦ</a>

                                </li>
                                <li class="dropdown productMN">
                                    <a href="{{ route('shop') }}">SẢN PHẨM</a>
                                    {{-- <i class="fa fa-angle-down"></i>
                                    <div class="box-menu">
                                        <div class="row">

                                            <div class="col-md-3 ">
                                                <div class=" slideSort">
                                                    <h3 class="slider-left-title">Catalog</h3>
                                                    <ul class="slide-left-list">
                                                        <li><a href="ProductGrid.html">Kitchen</a></li>
                                                        <li><a href="ProductGrid.html">Living room</a></li>
                                                        <li><a href="ProductGrid.html">Office</a></li>
                                                        <li><a href="ProductGrid.html">Gadgets</a></li>
                                                        <li><a href="ProductGrid.html">Accessories</a></li>
                                                        <li><a href="ProductGrid.html">Tool kits</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-3 ">

                                                <div class=" slideSort">
                                                    <h3 class="slider-left-title">Categories</h3>
                                                    <ul class="slide-left-list">
                                                        <li><a href="ProductGrid.html">New Product</a></li>
                                                        <li><a href="ProductGrid.html">Most Poupular</a>
                                                        </li>
                                                        <li><a href="ProductGrid.html">Top Trending</a></li>
                                                        <li><a href="ProductGrid.html">On Sale</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <div class="box-slider-left slideNewproduct slideNewproduct2">
                                                    <h3 class="slider-left-title" style="margin-bottom: 10px">Best
                                                        sellers</h3>
                                                    <div class="box-slideNewproduct">
                                                        <div class="slideNewproduct-item slideNewproduct-img">
                                                            <a href="SingleProduct.html"><img
                                                                    src="images/Product/1P5.jpg" alt="product1"
                                                                    class="img-responsive"></a>
                                                        </div>
                                                        <div class="slideNewproduct-item slideNewproduct-text">
                                                            <h5><a href="SingleProduct.html">Trailer</a>
                                                            </h5>
                                                            <p class="slideProduct-price">$32.00</p>
                                                        </div>
                                                    </div>
                                                    <div class="box-slideNewproduct ">
                                                        <div class="slideNewproduct-item slideNewproduct-img">
                                                            <a href="SingleProduct.html"><img
                                                                    src="images/Product/1P3.jpg" alt="product1"
                                                                    class="img-responsive"></a>
                                                        </div>
                                                        <div class="slideNewproduct-item slideNewproduct-text">
                                                            <h5><a href="SingleProduct.html">Magic Clock</a>
                                                            </h5>
                                                            <p class="slideProduct-price">$32.00</p>
                                                        </div>
                                                    </div>
                                                    <div class="box-slideNewproduct">
                                                        <div class="slideNewproduct-item slideNewproduct-img">
                                                            <a href="SingleProduct.html"><img
                                                                    src="images/Product/1P1.jpg" alt="product1"
                                                                    class="img-responsive"></a>
                                                        </div>
                                                        <div class="slideNewproduct-item slideNewproduct-text">
                                                            <h5><a href="SingleProduct.html">Obraz
                                                                    Mechaniczny</a></h5>
                                                            <p class="slideProduct-price">$32.00</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <h3 class="slider-left-title">Woody Store</h3>
                                                <div class="box-gallery">
                                                    <a href="AboutUs.html">
                                                        <img src="images/MN2.png" alt="banner slideBar"
                                                            class="img-responsive" style="width: 100%">
                                                        <div class="arrIcon">
                                                        </div>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div> --}}
                                </li>
                                <li class="dropdown">
                                    <a href="{{ route('promotion.get') }}">KHUYẾN MÃI</a>
                                </li>
                                <li class="dropdown">
                                    <a href="{{ route('customer.contact') }}">LIÊN HỆ</a>
                                </li>
                                <li class="dropdown">
                                    <a href="{{ route('customer.account') }}">TÀI KHOẢN</a>
                                </li>
                            </ul>
                        </div>
                        <div class="search2">
                            <ul>
                                <form id="my_form1" action="{{ route('shop.search') }}" method="get">
                                    <li>
                                        <input type="text" name="Search" placeholder="Tìm kiếm" class="">
                                    </li>
                                    <li>
                                        <a class="fa fa-search " href="javascript:{}"
                                            onclick="document.getElementById('my_form1').submit();"></a>
                                    </li>
                                </form>


                            </ul>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>
</div>
