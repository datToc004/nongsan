<!DOCTYPE html>
<!-- <html class="no-js" lang="en"> -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <base href="{{ asset('frontend') }}/">
    <meta name="author" content="ThemePunch" />
    <meta name="description" content="The Garden theme tempalte">
    <meta name="keywords" content="The Garden theme template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="icon" href="images/favicon.ico" type="image/gif" sizes="16x16"> -->
    <!--Icons fonts-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">

    <link href="vendor/themify-icons/themify-icons.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Overpass:100,100i,200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">
    <!--Styles-->
    <link href="vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/animsition/dist/css/animsition.min.css" rel="stylesheet">
    <link href="vendor/animate.css/source/slide_fwd_center/slide_fwd_center.css" rel="stylesheet">
    <link href="vendor/owl-carousel/css/owl.carousel.css" rel="stylesheet">
    <link href="vendor/css-hamburgers/css/hamburgers.min.css" rel="stylesheet">
    <link href="vendor/slick/css/slick.css" rel="stylesheet">
    <link href="vendor/range_filter/css/jquery-ui.css" rel="stylesheet">
    <!-- Revolution -->
    <link rel="stylesheet" type="text/css" href="vendor/slider-revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="vendor/slider-revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="vendor/slider-revolution/css/navigation.css">
    <!--Theme style-->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
</head>

<body>
    <!--        <div class="page-loader">-->
    <!--            <div class="spinner">-->
    <!--              <div class="rect1"></div>-->
    <!--              <div class="rect2"></div>-->
    <!--              <div class="rect3"></div>-->
    <!--              <div class="rect4"></div>-->
    <!--              <div class="rect5"></div>-->
    <!--            </div>-->
    <!--        </div>-->
    <div class="the-garden">
        @yield('header')
        @yield('content')
        @include('frontend.components.footer')

    </div>

    <script src="vendor/jquery/dist/jquery.min.js"></script>
    <script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendor/jquery_easing/jquery.easing.min.js"></script>
    <script src="vendor/owl-carousel/js/owl.carousel.js"></script>
    <script src="vendor/slick/js/slick.js"></script>
    <script src="vendor/isotope/js/isotope.js"></script>
    <script src="vendor/isotope/js/imagesloaded.pkgd.js"></script>
    <script src="vendor/range_filter/js/jquery-ui.js"></script>
    <script type="text/javascript" src="vendor/slider-revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="vendor/slider-revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="vendor/slider-revolution/js/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="vendor/slider-revolution/js/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="vendor/slider-revolution/js/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="vendor/slider-revolution/js/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="vendor/slider-revolution/js/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="vendor/slider-revolution/js/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="vendor/slider-revolution/js/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="vendor/slider-revolution/js/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="vendor/slider-revolution/js/revolution.extension.video.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="script/main.js"></script>
    @yield('script_shop')
    @yield('script_cart')
</body>

</html>
