@php
/**
 * Created by PhpStorm.
 * User: GODSPOWER
 * Date: 4/11/2019
 * Time: 1:23 AM
 */

function cano($s){
	$s = $output = trim(preg_replace(array("`'`", "`[^a-z0-9]+`"),  array("", "-"), strtolower($s)), "-");
	return $s;
}
@endphp



@extends('partials.master')
@section('page_title')
    {{ config('siteconfig.homepage_title') }}
@endsection
@section('scripts')

    @endsection


@section('content')
    <div class="scrollback">
        <div class="container">
            <div class="scrollcontent">
                <div class="carousel fcarousel fcarousel-6">
                    <div class="scrolltitle">
                        <h1><?php echo config('siteconfig.home_carousel_title') ?></h1>
                    </div>
                    <div class="carousel-container">
                        <div class="jcarousel">

                                    <ul>
                                        @if($topgrossapps->count() > 0)
                                            @foreach($topgrossapps as $tpp)
                                        <li>
                                            <div class="homethumb">
                                                <a href="{{ url('/app/' . $tpp->musicid[0] . '/' . cano($tpp->imname)) }}">
                                                    <img src="{!! asset($tpp->bigimage) !!}" alt="" width="180px" height="180px" >
                                                    <span class="overlay">
                                        </span>
                                                </a>
                                            </div>
                                        </li>
                                            @endforeach
                                    </ul>
                            @else
                                @php
                                    $homeapps_genre_id = config('siteconfig.homeapps_genre_id');
                                   $site_country = config('siteconfig.site_country');
                                   if(!empty($homeapps_genre_id)){
                                       $string = file_get_contents('https://itunes.apple.com/'.$site_country.'/rss/topgrossingapplications/limit=10/genre='.$homeapps_genre_id.'/xml');
                                   }else{
                                       $string = file_get_contents('https://itunes.apple.com/'.$site_country.'/rss/topgrossingapplications/limit=10/xml');
                                   }
                                   $string = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $string);
                                   $xml = simplexml_load_string($string);
                                @endphp
                                    <ul>

                                        @foreach($xml->entry as $val)
                                            @php
                                                $musicid = $val->id;
                                                $musicid = str_replace("/id/", "xxx", $musicid);
                                                $musicid = explode('/id',$musicid);
                                                $musicid = explode('?',$musicid[1]);
                                            @endphp
                                        <li>
                                            <div class="homethumb">
                                                <a href="{{ url('/app/' . $musicid[0] . '/' . cano($val->imname)) }}">
                                                    <img src="{!! asset(preg_replace('/100x100/ms', "180x180", $val->imimage[2])) !!}" alt="" width="180px" height="180px" >
                                                    <span class="overlay">

                                                        </span>
                                                </a>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>

                            @endif

                        </div><!-- end .jcarousel -->
                        <div class="carousel-prev" style="background: #4CAF50 url(images/scroll-left.png) no-repeat right 78px;"></div>
                        <div class="carousel-next" style="background: #4CAF50 url(images/scroll-right.png) no-repeat right 78px;"></div>


                    </div><!-- end .carousel-container -->
                </div><!-- end .carousel -->
            </div><!-- end .scrollcontent -->
        </div><!-- end .container -->
    </div><!-- end .scrollback -->
    <div class="homeframe">
        <div class="container" style="margin-bottom:20px;">

            <div class="pagetitle">

            </div>
            <div class="pageresults">
                <input type="radio" name="viewswitch" class="viewswitch-small" checked="checked" />
                <span class="control first"><i class="material-icons">apps</i></span>

                <input type="radio" name="viewswitch" class="viewswitch-medium" />
                <span class="control"><i class="material-icons">view_module</i></span>

                <input type="radio" name="viewswitch" class="viewswitch-large" />
                <span class="control last"><i class="material-icons">menu</i></span>
                        <ul class="page-itemlist">
                            @if($latestapps->count() > 0)
                                @foreach($latestapps as $lpp)
                            <li class="page-item">

                                <div class="pagethumb" data-toggle="tooltip" data-placement="top" title="{{ $lpp->imname1 }}">
                                    <a href="{{ url('/app/' . $lpp->musicid1[0] . '/' . cano($lpp->imname1)) }}">
                                        <img data-src="{!! asset($lpp->bigimage1) !!}" src="{!! asset('public/images/loading.svg') !!}" >
                                    </a>
                                </div>
                                <div class="info">
                                    <h3>
                                        <a href="{{ url('/app/' . $lpp->musicid1[0] . '/' . cano($lpp->imname1)) }}">{{ $lpp->imname1 }}</a>
                                    </h3>
                                    <h4>{{ $lpp->imartist1 }}</h4>
                                    <a class="genre" href="{{ url('/category/' . $lpp->catid1[0] . '/' . cano($lpp->label)) }}">{{ $lpp->label }}</a>
                                </div>
                            </li>
                                @endforeach
                        </ul>


                @else
                    @php
                        $site_country = config('siteconfig.site_country');
                        $string1 = file_get_contents('https://itunes.apple.com/'.$site_country.'/rss/newapplications/limit=100/xml');
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
                                        <img data-src="{!! asset(preg_replace('/100x100/ms', "150x150", $vall->imimage[2])) !!}" src="{!! asset('/public/images/loading.svg') !!}" ></a>
                                </div>

                                <div class="info">
                                    <h3>
                                        <a href="{{ url('/app/' . $musicid2[0] . '/' . cano($vall->imname)) }}">{{ $vall->imname }}</a>
                                    </h3>
                                    <h4>{{ $vall->imartist }}</h4>
                                    <a class="genre" href="{{ url('/category/' . $catid[0] . '/' . cano($vall->category->attributes()->label)) }}">{{ $vall->category->attributes()->label }}</a>
                                </div>
                                @endforeach
                            </li>
                        </ul>
                @endif
            </div>
            <!-- end latestapps -->
            <script src="<?php echo config('siteconfig.site_url')?>/public/js/imglazyload.js"></script>
            <script>
            //lazy loading
            $('.homeframe img').imgLazyLoad({
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
            <script type="text/javascript" src="{!! asset('public/js/bigstar-rating.js') !!}"></script>
            <script type="text/javascript">
                jQuery(function() {
                    jQuery('span.bigstars').bigstars();
                });
            </script>
            <script type="text/javascript" src="{!! asset('public/js/star-rating.js') !!}"></script>
            <script type="text/javascript" language="JavaScript">
                jQuery(function() {
                    jQuery('span.stars').stars();
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".fancybox").fancybox();
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
        </div><!-- end .container -->
    </div><!-- end .homeframe -->
@endsection




