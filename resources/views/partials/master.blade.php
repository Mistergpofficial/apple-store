<!doctype html>
<html>
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>@yield('page_title', 'Default Title')</title>
    <meta name="description" content="<?php echo config('siteconfig.homepage_desc') ?>" />
    <meta name="keywords" content="<?php echo config('siteconfig.site_keywords') ?>" />
    <meta property="og:site_name" content="<?php echo config('siteconfig.site_title') ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?php echo config('siteconfig.homepage_title') ?>"/>
    <meta property="og:description" content="<?php echo config('siteconfig.homepage_desc') ?>"/>
    <!-- CSS and Scripts -->
    @include('includes.headscripts')
    <script src="{!! asset('public/js/jquery.jcarousel.min.js') !!}"></script>


    @yield('scripts')

    <script>
        jQuery(document).ready(function($){
            if(jQuery().jcarousel) {
                // Featured Carousel - Horizontal
                $(window).bind('load resize', function(){

                    $('.fcarousel-6').deCarousel();
                    $('.fcarousel-5').deCarousel();
                });
                // games carousel
                $('.jcarousel').jcarousel({
                    wrap: 'circular'
                });
                $('.jcarousel').jcarouselAutoscroll({
                    target: '+=3',
                    interval: 4000,
                    autostart: true
                });

                // Featured Carousel - Vertical
                $('.carousel-clip').jcarousel({
                    vertical: true,
                    wrap: 'circular'
                });
                $('.carousel-prev').jcarouselControl({target: '-=4'});
                $('.carousel-next').jcarouselControl({target: '+=4'});
            }
        });
    </script>

    @include('ads.head_code')

</head>
<body>
@include('includes.header')
@yield('content')
@include('includes.footer')
<p id="back-top"><a href="#top"><i class="material-icons">keyboard_arrow_up</i></a></p>
</body>
</html>