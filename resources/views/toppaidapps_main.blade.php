@php
/**
 * Created by PhpStorm.
 * User: GODSPOWER
 * Date: 4/11/2019
 * Time: 1:23 AM
 */

@endphp

        <!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title><?php echo config('siteconfig.toppaidapps_title') ?> - <?php echo config('siteconfig.site_title') ?></title>
    <meta name="description" content="<?php echo config('siteconfig.toppaidapps_title') ?> - <?php echo config('siteconfig.site_title') ?>" />
    <meta name="keywords" content="<?php echo config('siteconfig.site_keywords') ?>" />
    <meta property="og:site_name" content="<?php echo config('siteconfig.site_title') ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?php echo config('siteconfig.toppaidapps_title') ?> - <?php echo config('siteconfig.site_title') ?>"/>
    <meta property="og:description" content="<?php echo config('siteconfig.toppaidapps_title') ?> - <?php echo config('siteconfig.site_title') ?>"/>
    <!-- CSS and Scripts -->
    @include('includes.headscripts')
    @include('ads.head_code')
</head>
<body>
@include('includes.header')
@include('url_slug')
    <div class="container">
        <div class="pagetitle">
            <h1><?php echo config('siteconfig.page_title') ?></h1>
        </div>
        <div class="pageresults">
            <input type="radio" name="viewswitch" class="viewswitch-small" checked="checked" />
            <span class="control first"><i class="material-icons">apps</i></span>

            <input type="radio" name="viewswitch" class="viewswitch-medium" />
            <span class="control"><i class="material-icons">view_module</i></span>

            <input type="radio" name="viewswitch" class="viewswitch-large" />
            <span class="control last"><i class="material-icons">menu</i></span>
            <ul class="page-itemlist">
                        <ul class="page-itemlist">
                            @if($toppaidapps->count() > 0)
                                @foreach($toppaidapps as $toppaidapp)
                            <li class="page-item">
                                <div class="pagethumb" data-toggle="tooltip" data-placement="top" title="{{ $toppaidapp->imname1 }}">
                                    <a href="{!! url('/app/'.$toppaidapp->musicid1[0].'/'.cano($toppaidapp->imname1)) !!}">
                                        <img data-src="{!! asset($toppaidapp->bigimage1) !!}" src="{!! asset('public/images/loading.svg') !!}" >
                                    </a>
                                </div>
                                <div class="info">
                                    <h3>
                                        <a href="{{ url('/app/' . $toppaidapp->musicid1[0] . '/' . cano($toppaidapp->imname1)) }}">{{ $toppaidapp->imname1 }}</a>
                                    </h3>
                                    <h4>{{ $toppaidapp->imartist1 }}</h4>
                                    <a class="genre" href="{{ url('/category/' . $toppaidapp->catid1[0] . '/' . cano($toppaidapp->label)) }}">{{ $toppaidapp->label }}</a>
                                    <span class="summary">{{ $toppaidapp->summary }}</span>
                                </div>
                            </li>
                                @endforeach
                        </ul>
                @else
                    @php
                        $site_country = config('siteconfig.site_country');
                        $string1 = file_get_contents('https://itunes.apple.com/'.$site_country.'/rss/toppaidapplications/limit=100/xml');
                       // Remove the colon ":" in the <xxx:yyy> to be <xxxyyy>
                       $string1 = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $string1);
                       $xmll = simplexml_load_string($string1);
                    @endphp
                        <ul class="page-itemlist">
                            @foreach($xmll->entry as $vall)
                                @php
                                    $musicid2 = $vall->id;
                                    $musicid2 = str_replace("/id/", "xxx", $musicid2);
                                    $musicid2 = explode('/id',$musicid2);
                                    $musicid2 = explode('?',$musicid2[1]);
                                     $catid = $vall->category->attributes()->scheme;
                                     $catid = str_replace("/id/","xxx",$catid);
                                     $catid=explode('/id',$catid);
                                     $catid=explode('?',$catid[1]);
                                @endphp
                            <li class="page-item">
                                <div class="pagethumb" data-toggle="tooltip" data-placement="top" title="{{ $vall->imname }}">
                                    <a href="{{ url('/app/' . $musicid2[0] . '/' . cano($vall->imname)) }}">
                                        <img data-src="{!! asset(preg_replace('/100x100/ms', "150x150", $vall->imimage[2])) !!}" src="{!! asset('public/images/loading.svg') !!}" >
                                    </a>
                                </div>

                                <div class="info">
                                    <h3>
                                        <a href="{{ url('/app/' . $musicid2[0] . '/' . cano($vall->imname)) }}">{{ $vall->imname }}</a>
                                    </h3>
                                    <h4>{{ $vall->imartist }}</h4>
                                    <a class="genre" href="{{ url('/category/' . $catid[0] . '/' . cano($vall->category->attributes()->label)) }}">{{ $vall->category->attributes()->label }}</a>
                                    <span class="summary">{{ substr($vall->summary, 0,430) }}...</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                @endif
            </ul>
        </div>
    </div>
    <script src="<?php echo config('siteconfig.site_url')?>/public/js/imglazyload.js"></script>
    <script>
        //lazy loading
        $('.page-itemlist img').imgLazyLoad({
            // jquery selector or JS object
            container: window,
            // jQuery animations: fadeIn, show, slideDown
            effect: 'fadeIn',
            // animation speed
            speed: 600,
            // animation delay
            delay: 400,
            // callback function
            callback: function(){}
        });
    </script>
    <script>
        $(document).ready(function(){

            // hide #back-top first
            $("#back-top").hide();

            // fade in #back-top
            $(function () {
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 200) {
                        $('#back-top').fadeIn();
                    } else {
                        $('#back-top').fadeOut();
                    }
                });

                // scroll body to 0px on click
                $('#back-top a').click(function () {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 800);
                    return false;
                });
            });

        });
    </script>


<p id="back-top"><a href="#top"><i class="material-icons">keyboard_arrow_up</i></a></p>
@include('includes.footer')
</body>
</html>