<?php
/**
 * Created by PhpStorm.
 * User: GODSPOWER
 * Date: 4/11/2019
 * Time: 4:27 PM
 */
?>

        <!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title><?php echo config('siteconfig.searchresults_title')  ?> {{ $searchData1 }} - {{ config('siteconfig.site_title')  }}</title>
    <meta name="description" content="<?php echo config('siteconfig.searchresults_title')  ?> - {{ $searchData1 }} - {{ config('siteconfig.site_title')  }}" />
    <meta name="keywords" content="<?php echo config('siteconfig.site_keywords') ?>" />
    <meta property="og:site_name" content="<?php echo config('siteconfig.site_title') ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="<?php echo config('siteconfig.searchresults_title')  ?> - {{ $searchData1 }} - {{ config('siteconfig.site_title')  }}"/>
    <meta property="og:description" content="<?php echo config('siteconfig.searchresults_title')  ?> - {{ $searchData1 }} - {{ config('siteconfig.site_title')  }}"/>
    <!-- CSS and Scripts -->
    @include('includes.headscripts')
    @include('ads.head_code')
</head>
<body>
@include('includes.header')
@include('url_slug')

<div class="container">
    <div class="pagetitle">
        <h1><?php echo config('siteconfig.searchresults_title') ?>: {{ $searchData1 }}</h1>
    </div>
    <div class="pageresults">
        <input type="radio" name="viewswitch" class="viewswitch-small" checked="checked" />
        <span class="control first"><i class="material-icons">apps</i></span>

        <input type="radio" name="viewswitch" class="viewswitch-medium" />
        <span class="control"><i class="material-icons">view_module</i></span>

        <input type="radio" name="viewswitch" class="viewswitch-large" />
        <span class="control last"><i class="material-icons">menu</i></span>
        <ul class="page-itemlist">
            @if($search->count() > 0)
                @foreach($search as $see)
            <li class="page-item">
                <div class="pagethumb" data-toggle="tooltip" data-placement="top" title="{{ $see->track_name }}">
                    <a href="{{ url('/app/' . $see->track_id . '/' . cano($see->track_name)) }}">
                        <img data-src="{!! asset($see->image) !!}" src="{!! asset('public/images/loading.svg') !!}" >
                    </a>
                </div>
                <div class="info">
                    <h3>
                        <a href="{{ url('/app/' . $see->track_id . '/' . cano($see->track_name)) }}">{{ $see->track_name }}</a>
                    </h3>
                    <h4>{{ $see->artist_name }}</h4>
                    <a class="genre" href="{{ url('/category/' . $see->primary_genre_id . '/' . cano($see->primary_genre_name)) }}">{{ $see->primary_genre_name }}</a>
                    <span class="summary">{{ $see->description }}...</span>
                </div>
            </li>
                @endforeach
        </ul>

                {{--<div class="col-md-12 text-center">--}}
                {{--{{ $search->links() }}--}}
                {{--</div>--}}
            @else
            <div style="height:300px;"><?php echo config('siteconfig.search_noresults_title')?><div>
        @endif
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
    </div>
</div>

<p id="back-top"><a href="#top"><i class="material-icons">keyboard_arrow_up</i></a></p>
@include('includes.footer')
</body>
</html>