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

        <!doctype html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width">
            @if(count($category) === 0)
                <title>{{ $catid2 }} <?php echo config('siteconfig.catpage_title') ?> - <?php echo config('siteconfig.site_title') ?></title>
            @else
                @foreach($category as $catego)
                    <title>{{ $catego->label }} <?php echo config('siteconfig.catpage_title') ?> - <?php echo config('siteconfig.site_title') ?></title>
                @endforeach
            @endif

            @if(count($category) === 0)
                <meta name="description" content="{{ $catid2 }} <?php echo config('siteconfig.catpage_title') ?> - <?php echo config('siteconfig.site_title') ?>" />
                <meta name="keywords" content="<?php echo config('siteconfig.site_keywords') ?>" />
                <meta property="og:site_name" content="<?php echo config('siteconfig.site_title') ?>"/>
                <meta property="og:type" content="website"/>
                <meta property="og:title" content="{{ $catid2 }} <?php echo config('siteconfig.catpage_title') ?> - <?php echo config('siteconfig.site_title') ?>"/>
                <meta property="og:description" content="{{ $catid2 }} <?php echo config('siteconfig.catpage_title') ?> - <?php echo config('siteconfig.site_title') ?>"/>
            @else
                @foreach($category as $catego)
                    <meta name="description" content="{{ $catego->label }} <?php echo config('siteconfig.catpage_title') ?> - <?php echo config('siteconfig.site_title') ?>" />
                    <meta name="keywords" content="<?php echo config('siteconfig.site_keywords') ?>" />
                    <meta property="og:site_name" content="<?php echo config('siteconfig.site_title') ?>"/>
                    <meta property="og:type" content="website"/>
                    <meta property="og:title" content="{{ $catego->label }} <?php echo config('siteconfig.catpage_title') ?> - <?php echo config('siteconfig.site_title') ?>"/>
                    <meta property="og:description" content="{{ $catego->label }} <?php echo config('siteconfig.catpage_title') ?> - <?php echo config('siteconfig.site_title') ?>"/>
                @endforeach
            @endif

            <!-- CSS and Scripts -->
            <link href="{!! asset('public/material/css/bootstrap.min.css') !!}" rel="stylesheet">
            <link href="{!! asset('public/material/css/bootstrap-material-design.css') !!}" rel="stylesheet">
            <link href="{!! asset('public/material/css/ripples.css') !!}" rel="stylesheet">
            <link href="{!! asset('public/material/css/jquery.dropdown.css') !!}" rel="stylesheet">
            <link href="{!! asset('public/material/css/style.css') !!}" rel="stylesheet">

            <link rel="icon" type="image/png" href="{!! asset('public/favicon.ico') !!}">
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500" type="text/css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            @include('ads.head_code')
        </head>
        <body>
       @include('includes.header')

    <div class="container">
        <div class="pagetitle">
            @if(count($category) === 0)
            <h1>{{ $catid2 }} <?php echo config('siteconfig.catpage_title') ?></h1>
            @else

                    <h1>{{ $catego->label }} <?php echo config('siteconfig.catpage_title') ?></h1>

            @endif
        </div>
        <div class="pageresults">
            <input type="radio" name="viewswitch" class="viewswitch-small" checked="checked" />
            <span class="control first"><i class="material-icons">apps</i></span>

            <input type="radio" name="viewswitch" class="viewswitch-medium" />
            <span class="control"><i class="material-icons">view_module</i></span>

            <input type="radio" name="viewswitch" class="viewswitch-large" />
            <span class="control last"><i class="material-icons">menu</i></span>
            <ul class="page-itemlist">
                @if($category->count() > 0)
                    @foreach($category as $catego)
                <li class="page-item">
                    <div class="pagethumb" data-toggle="tooltip" data-placement="top" title="{{ $catego->imname1 }}">
                        <a href="{{ url('/app/' . $catego->musicid2 . '/' . cano($catego->imname1)) }}">
                            <img data-src="{!! asset('public/images/loading.svg') !!}" src="{!! asset($catego->bigimage1) !!}" >
                        </a>
                    </div>
                    <div class="info">
                        <h3>
                            <a href="{{ url('/app/' . $catego->musicid2 . '/' . cano($catego->imname1)) }}">{{ $catego->imname1 }}</a>
                        </h3>
                        <h4>{{ $catego->imartist1 }}</h4>
                        <a class="genre" href="{{ url('/genre/' . $catego->catid1[0] . '/' . cano($catego->label)) }}">{{ $catego->label }}</a>
                        <span class="summary">{{ $catego->summary }}...</span>
                    </div>
                </li>
                    @endforeach
            </ul>

                @else
                @php
                    $link_id = $genreid;
                    $site_country = config('siteconfig.site_country');
                    $string1 = file_get_contents('https://itunes.apple.com/'.$site_country.'/rss/topgrossingapplications/limit=100/genre='.$link_id.'/xml');
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
                                <img data-src="{!! asset('public/images/loading.svg') !!}" src="{!! asset(preg_replace('/100x100/ms', "150x150", $vall->imimage[2])) !!}" >
                            </a>
                        </div>
                        <div class="info">
                            <h3>
                                <a href="{{ url('/app/' . $musicid2[0] . '/' . cano($vall->imname)) }}">{{ $vall->imname }}</a>
                            </h3>
                            <h4>{{ $vall->imartist  }}</h4>
                            <a class="genre" href="{{ url('/genre/' . $catid[0] . '/' . cano($vall->category->attributes()->label)) }}">{{ $vall->category->attributes()->label }}</a>
                            <span class="summary">'.substr($val->summary, 0, 430).'...</span>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
        </div>
    </div>

    <p id="back-top"><a href="#top"><i class="material-icons">keyboard_arrow_up</i></a></p>
    @include('includes.footer')
    </body>
    </html>