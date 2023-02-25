<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{ isset($title) ? $title : '' }}</title>
        <meta content="{{ isset($keywords) ? $keywords : '' }}" name="keywords">
        <meta content="{{ isset($meta_desc) ? $meta_desc : '' }}" name="description">

        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <!-- Favicon -->
        <link href="{{ asset("storage/img/favicon.ico") }}" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 

        <!-- Libraries CSS -->
        <link href="{{ asset("lib/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
        <link href="{{ asset("lib/ionicons/css/ionicons.min.css") }}" rel="stylesheet">
        <link href="{{ asset("lib/owlcarousel/assets/owl.carousel.min.css") }}" rel="stylesheet">
        <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

        <!-- Main Stylesheet -->
        <link href="{{ asset("css/style.css") }}" rel="stylesheet">
    </head>

    <body>
        <!-- Nav Start -->
        	@yield('navigation')
        <!-- Nav End -->

        <!-- Header Start-->
        @yield('slider')
        <!-- Header End-->
        
        <!-- CONTENT -->
        @yield('content')
        <!-- ENDCONTENT -->

        <!-- Footer Start -->
        @yield('footer')
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="ion-ios-arrow-up"></i></a>
        <span id="status" class="alert alert-success"></span>
        <span id="preloader" class="preloader"><img src="{{ asset('storage/img/ring.svg') }}" alt=""></img></span>

        <!-- Libraries JS -->
        <script src="{{ asset("lib/jquery/jquery.min.js") }}"></script>
        <script src="{{ asset("lib/jquery/jquery-migrate.min.js") }}"></script>
        <script src="{{ asset("lib/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
        <script src="{{ asset("lib/easing/easing.min.js") }}"></script>
        <script src="{{ asset("lib/waypoints/waypoints.min.js") }}"></script>
        <script src="{{ asset("lib/counterup/counterup.min.js") }}"></script>
        <script src="{{ asset("lib/owlcarousel/owl.carousel.min.js") }}"></script>
        <script src="{{ asset("lib/lightbox/js/lightbox.min.js") }}"></script>

        <!-- Main Javascript -->
        <script src="{{ asset("js/main.js") }}"></script>
        <script src="{{ asset("js/index.js") }}"></script>

    </body>
</html>
