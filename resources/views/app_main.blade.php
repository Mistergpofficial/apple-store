<?php
/**
 * Created by PhpStorm.
 * User: GODSPOWER
 * Date: 4/11/2019
 * Time: 1:23 AM
 */
?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    @if(count($individualapps) === 0)
        <title>{{ $item_title }} - {{ config('siteconfig.app_page_title') }} - {{ config('siteconfig.site_title') }}</title>
    @else
        @foreach($individualapps as $individualapp)
            <title>{{ $individualapp->track_name }} - {{ config('siteconfig.app_page_title') }} - {{ config('siteconfig.site_title') }}</title>
        @endforeach
    @endif
    @if(count($individualapps) === 0)
        <meta name="description" content="{{ $item_title }}- <?php echo config('siteconfig.app_page_title') ?> - <?php echo config('siteconfig.site_title') ?>" />
        <meta name="keywords" content="{{ $item_title }}, <?php echo config('siteconfig.site_keywords') ?>" />
        <meta property="og:site_name" content="<?php echo config('siteconfig.site_title') ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:title" content="{{ $item_title }} - <?php echo config('siteconfig.app_page_title') ?> - <?php echo config('siteconfig.site_title') ?>"/>
        <meta property="og:description" content="{{ $item_title }} - <?php echo config('siteconfig.app_page_title') ?> - <?php echo config('siteconfig.site_title') ?>"/>
        <meta property="og:image" content="{{ $main_image }}">
    @else
        @foreach($individualapps as $individualapp)
            <meta name="description" content="{{ $individualapp->track_name }} - <?php echo config('siteconfig.app_page_title') ?> - <?php echo config('siteconfig.site_title') ?>" />
            <meta name="keywords" content="{{ $individualapp->track_name }}, <?php echo config('siteconfig.site_keywords') ?>" />
            <meta property="og:site_name" content="<?php echo config('siteconfig.site_title') ?>"/>
            <meta property="og:type" content="article"/>
            <meta property="og:title" content="{{ $individualapp->track_name }} - <?php echo config('siteconfig.app_page_title') ?> - <?php echo config('siteconfig.site_title') ?>"/>
            <meta property="og:description" content="{{ $individualapp->track_name }} - <?php echo config('siteconfig.app_page_title') ?> - <?php echo config('siteconfig.site_title') ?>"/>
            <meta property="og:image" content="{{ $individualapp->image }}">
        @endforeach
    @endif
     <!-- CSS and Scripts -->
    @include('includes.headscripts')

    @include('ads.head_code')
</head>
<body>
@include('includes.header')
@include('url_slug')

@php
    // Snippet from PHP Share: http://www.phpshare.org
    function formatSizeUnits($bytes)
    {
    if ($bytes >= 1073741824)
    {
    $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576)
    {
    $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
    $bytes = number_format($bytes / 1024, 2) . ' kB';
    }
    elseif ($bytes > 1)
    {
    $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1)
    {
    $bytes = $bytes . ' byte';
    }
    else
    {
    $bytes = '0 bytes';
    }

    return $bytes;
    }

    @endphp

@if($individualapps->count() > 0)
    @foreach($individualapps as $individualapp)
        <div class="headpage">
            <div class="container">
                <div class="headpageimage">
                    <img data-src="{!! asset($individualapp->image) !!}" src="<?php echo config('siteconfig.site_url')?>/public/images/loading.svg" alt="{{ $individualapp->track_name }}" height="200px" width="200px">
                </div>
                <div class="headpageinfo">
                    <h1 class="product-title">{{ $individualapp->track_name }}</h1>
                    <h2 class="product-stock"><?php echo config('siteconfig.byartist_mpage')?> {{ $individualapp->artist_name }}</h2>
                    <ul style="list-style:none;padding: 0px;">
                        <li><b><?php echo config('siteconfig.cat_mpage')?>:</b> <a href="{{ url('/category/' . $individualapp->genre_ids[0] . '/' . cano($individualapp->genre_title)) }}">{{ $individualapp->genre_title }}</a></li>
                        <li><b><?php echo config('siteconfig.release_mpage') ?>:</b> {{ $individualapp->release_date }}</li>
                        <li><b><?php echo config('siteconfig.curv_mpage') ?>:</b> {{ $individualapp->version }}</li>
                        <li><b><?php echo config('siteconfig.adrat_mpage') ?>:</b> {{ $individualapp->content_advisory }}</li>
                        <li><b><?php echo config('siteconfig.filsz_mpage') ?>:</b> {{ formatSizeUnits($individualapp->file_size_bytes) }}</li>
                        @if(isset($individualapp->seller_url) && $individualapp->seller_url == true)
                            <li><b><?php echo config('siteconfig.dev_mpage')?>: <a href="{!! asset($individualapp->seller_url) !!}" target="_blank" rel="nofollow">{{ $individualapp->artist_name }}</a></b></li>
                        @else
                            <b><?php echo config('siteconfig.dev_mpage')?>: {{ $individualapp->artist_name }}</b>
                        @endif
                        <li><b><?php echo config('siteconfig.comp_mpage')?>:</b> <?php echo config('siteconfig.req_mpage')?> {{ $individualapp->minimum_os_version }} <?php echo config('siteconfig.req_end_mpage')?></li>
                    </ul>
                </div>
                <div class="headpageright">
                    @if(isset($individualapp->average_user_rating) && !empty($individualapp->average_user_rating))
                        <div class="product-rating">
                            <div class="score"><span><?php echo config('siteconfig.score_mpage')?>: {{ $individualapp->average_user_rating }}</span></div>
                            <div class="bigstarbox">
                                <span class="bigstars">{{ $individualapp->average_user_rating }}</span>
                            </div>
                            <div class="scorecount"><span><?php echo config('siteconfig.from_mpage')?> {{ number_format($individualapp->user_rating_counting)  }}<?php echo config('siteconfig.ratings_mpage')?></span></div>
                        </div>
                    @endif
                        <div class="postactions">
                            @if(isset($musicid) && !empty($musicid))
                                <a href="{{ $individualapp->geo_link }}&at={{ $musicid }}" target="_blank" class="btn btn-raised btn-warning">{{ $individualapp->formatted_price }} <?php echo config('siteconfig.itunelink_mpage') ?></a>
                            @endif
                            <div style="display: inline-block;float: right;">
                                <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                                    <a class="addthis_button_preferred_1"></a>
                                    <a class="addthis_button_preferred_2"></a>
                                    <a class="addthis_button_preferred_3"></a>
                                    <a class="addthis_button_compact"></a>
                                </div>
                            </div>
                        </div>


            </div>
        </div>


            <div class="container">
                <div class="col-md-8" style="margin-top: 30px;padding-left:0px;">
                    <div class="postmain">
                        <div class="postmaintitle" style="margin-bottom:5px;">
                            <h3><?php echo config('siteconfig.descriphead_mpage') ?></h3>
                        </div>
                        <div class="postmaindescr">
                            <p>
                                {{ $individualapp->description }}
                            </p>
                        </div>
                    </div>
                    <!-- end .postmain -->


                    <div class="postmain">
                        <div class="postmaintitle">
                            <h3><?php echo config('siteconfig.scrhead_mpage')?></h3>
                        </div>
                        <div class="postscreens">

                            @foreach( $individualapp->screenshots as $screenshotUrl )
                                <a class="fancybox" rel="group" href="{{ $screenshotUrl }}"><img src="{!! asset($screenshotUrl) !!}"></a>
                            @endforeach


                        </div>
                    </div>
                    <!-- end .postmain -->
                    @php
                        $reviewshead_mpage = config('siteconfig.reviewshead_mpage');
                        $reviewsby_mpage = config('siteconfig.reviewsby_mpage');
                    @endphp

                    @if (!empty($customerReviews))
                    <div class="postmain">
                        <div class="postmaintitle">
                            <h3><?php echo config('siteconfig.reviewshead_mpage') ?></h3>
                        </div>
                        <div id="reviews">
                            <ul style="list-style:none;padding: 0px;">
                               @foreach($customerReviews as $cus)
                                    @if($counter++ == 0)
                                        @continue;
                                    @endif
                                    @if ($counter < $max)
                                    <li>
                                        <h4 class=\"tit\">{{ $cus->label }}</h4>
                                        <div class="starbox"><span class="stars">{{ $cus->rating }}</span></div>
                                        <div class=\"auth\"><?php echo config('siteconfig.reviewsby_mpage') ?> {{$cus->author}}</div>
                                        <div class=\"cont\">{{$cus->content }}</div>
                                    </li>
                                        @endif
                                   @endforeach
                            </ul>
                        </div>
                    </div>
                        @else
                        @php
                            {}
                        @endphp
                        @endif


                    @php
                        $disqus_shortname = config('siteconfig.disqus_shortname');
                    @endphp
                     @if(isset($disqus_shortname) and !empty($disqus_shortname))
                    <div class="postmain">
                        <div class="postmaintitle">
                            <h3><?php echo config('siteconfig.commentbox_mpage')?></h3>
                        </div>
                        <div class="videocomments">
                            <div id="disqus_thread"></div>
                            <script type="text/javascript">
                                /* * * CONFIGURATION VARIABLES * * */
                                var disqus_shortname = '<?php echo config('siteconfig.$disqus_shortname')?>';

                                /* * * DON'T EDIT BELOW THIS LINE * * */
                                (function() {
                                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                        </div>
                    </div>
                    @endif
                <!-- end .postmain -->
                </div>
                <!-- .post-sidebar -->
                <div class="col-md-4" style="padding-right:0px;">
                    <div class="post-sidebar">
                        <div class="post-sidebar-box">
                            <h3><?php echo config('siteconfig.morebyartist_mpage');?> {{ $individualapp->artist_name }}</h3>
                            @foreach($extras as $extra)
                            <ul class="side-itemlist">
                                <li class="side-item">
                                    <div class="side-thumb">
                                        <a href="{{ url('/app/' . $extra->track_id . '/' . cano($extra->track_name)) }}">
                                            <img data-src="{!! asset($extra->art_work_url) !!}" src="{!! asset('public/images/loading.svg') !!}" >
                                        </a>
                                    </div>
                                    <div class="info">
                                        <h3>
                                            <a href="{{ url('/app/' . $extra->track_id . '/' . cano($extra->track_name)) }}">{{ $extra->track_name }}</a>
                                        </h3>
                                        <h4>{{ $extra->artist_name }}</h4>

                                       <div class="starbox">
                                           <span class="stars">{{ $extra->average_user_rating }}</span>
                                       </div>

                                        </div></li>

                            </ul>
                            @endforeach
                        </div>

                    </div>
                </div>

                <!-- end .post-sidebar -->
            </div>






                </div>

    @endforeach
    @else

    <div class="headpage">
        <div class="container">
            <div class="headpageimage">
                <img data-src="{!! asset($main_image) !!}" src="<?php echo config('siteconfig.site_url')?>/public/images/loading.svg" alt="{{ $item_title }}" height="200px" width="200px">
            </div>
            <div class="headpageinfo">
                <h1 class="product-title">{{ $item_title }}</h1>
                <h2 class="product-stock"><?php echo config('siteconfig.byartist_mpage')?> {{ $artist_title }}</h2>
                <ul style="list-style:none;padding: 0px;">
                    <li><b><?php echo config('siteconfig.cat_mpage')?>:</b> <a href="{{ url('/category/' . $genreIds[0] . '/' .cano($genre_title)) }}">{{ $genre_title }}</a></li>
                    <li><b><?php echo config('siteconfig.release_mpage') ?>:</b> {{ $releaseDate }}</li>
                    <li><b><?php echo config('siteconfig.curv_mpage') ?>:</b> {{ $version }}</li>
                    <li><b><?php echo config('siteconfig.adrat_mpage') ?>:</b> {{ $contentAdvisoryRating }}</li>
                    <li><b><?php echo config('siteconfig.filsz_mpage') ?>:</b> {{ formatSizeUnits($fileSizeBytes) }}</li>
                    @if(isset($response->results[0]->sellerUrl) && $response->results[0]->sellerUrl == true)
                        <li><b><?php echo config('siteconfig.dev_mpage')?>:</b> <a href="{!! asset($response->results[0]->sellerUrl) !!}" target="_blank" rel="nofollow">{{ $artist_title }}</a></li>
                    @else
                        <b><?php echo config('siteconfig.dev_mpage')?>: {{ $artist_title }}</b>
                    @endif
                    <li><b><?php echo config('siteconfig.comp_mpage')?>:</b> <?php echo config('siteconfig.req_mpage')?> {{ $minimumOsVersion }} <?php echo config('siteconfig.req_end_mpage')?></li>
                </ul>
            </div>
            <div class="headpageright">
                @if(isset($response->results[0]->averageUserRating) and !empty($response->results[0]->averageUserRating))
                    <div class="product-rating">
                        <div class="score"><span><?php echo config('siteconfig.score_mpage')?>: <?php echo $response->results[0]->averageUserRating;?></span></div>
                        <div class="bigstarbox">
                            <span class="bigstars"><?php echo $response->results[0]->averageUserRating;?></span>
                        </div>
                        <div class="scorecount"><span><?php echo config('siteconfig.from_mpage')?> <?php echo number_format($response->results[0]->userRatingCount);?> <?php echo config('siteconfig.ratings_mpage')?></span></div>
                    </div>
                @endif



                <div class="postactions">
                    @if(isset($musicid) && !empty($musicid))
                        <a href="{{ $geo_link }}&at={{ $musicid }}" target="_blank" class="btn btn-raised btn-warning"><?php echo $response->results[0]->formattedPrice;?> <?php echo config('siteconfig.itunelink_mpage') ?></a>
                    @endif
                    <div style="display: inline-block;float: right;">
                        <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                            <a class="addthis_button_preferred_1"></a>
                            <a class="addthis_button_preferred_2"></a>
                            <a class="addthis_button_preferred_3"></a>
                            <a class="addthis_button_compact"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-8" style="margin-top: 30px;padding-left:0px;">
            <div class="postmain">
                <div class="postmaintitle" style="margin-bottom:5px;">
                    <h3><?php echo config('siteconfig.descriphead_mpage') ?></h3>
                </div>
                <div class="postmaindescr">
                    <p>
                        <?php echo $response->results[0]->description;?>
                    </p>
                </div>
            </div>
            <!-- end .postmain -->



            <div class="postmain">
                <div class="postmaintitle">
                    <h3><?php echo config('siteconfig.scrhead_mpage')?></h3>
                </div>
                <div class="postscreens">
                    <?php foreach ( $response->results[0]->screenshotUrls as $screenshotUrl )
                    {
                        echo '<a class="fancybox" rel="group" href="'.$screenshotUrl.'"><img src="'.$screenshotUrl.'"></a>';
                    }
                    ?>
                </div>
            </div>
            <!-- end .postmain -->

            @php
                $site_country = config('siteconfig.site_country');
                $link_id = $musicid;
                $jsonurl = "https://itunes.apple.com/$site_country/rss/customerreviews/page=1/id=$link_id/sortBy=mostRecent/json";
               $json = file_get_contents($jsonurl,0,null,null);
               $json_output = json_decode($json);

               $counter = 0;
               $max = 21;
            @endphp




            @php
            $reviewshead_mpage = config('siteconfig.reviewshead_mpage');
            $reviewsby_mpage = config('siteconfig.reviewsby_mpage');
            $site_country = config('siteconfig.site_country');
            $jsonurl = "https://itunes.apple.com/$site_country/rss/customerreviews/page=1/id=$musicid/sortBy=mostRecent/json";
            $json = file_get_contents($jsonurl,0,null,null);
            $json_output = json_decode($json);

            $counter = 0;
            $max = 21;
            if (!empty($json_output->feed->entry)) {
                echo '<div class="postmain">
<div class="postmaintitle">
<h3>'.$reviewshead_mpage.'</h3>
</div>

<div id="reviews">
<ul style="list-style:none;padding: 0px;">';
                foreach ( $json_output->feed->entry as $entry )
                {
                    if ($counter++ == 0) continue;
                    if ($counter < $max) {
                        echo "<li>";
                        echo "<h4 class=\"tit\">{$entry->title->label}</h4>\n";
                        echo '<div class="starbox"><span class="stars">'.$entry->{'im:rating'}->label.'</span></div>';
                        echo "<div class=\"auth\">{$reviewsby_mpage} {$entry->author->name->label}</div>\n";
                        echo "<div class=\"cont\">{$entry->content->label}</div>\n";
                        echo "</li>\n";
                    }
                    $counter++;
                }
                echo '</ul>
</div>
</div>
<!-- end .postmain -->';
            }
            else {}
            @endphp


            <?php
            $disqus_shortname = config('siteconfig.disqus_shortname');
            $commentbox_mpage = config('siteconfig.commentbox_mpage');
            if(isset($disqus_shortname) and !empty($disqus_shortname)):
            ?>
            <div class="postmain">
                <div class="postmaintitle">
                    <h3><?php echo $commentbox_mpage;?></h3>
                </div>
                <div class="videocomments">
                    <div id="disqus_thread"></div>
                    <script type="text/javascript">
                        /* * * CONFIGURATION VARIABLES * * */
                        var disqus_shortname = '<?php echo $disqus_shortname;?>';

                        /* * * DON'T EDIT BELOW THIS LINE * * */
                        (function() {
                            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                </div>
            </div>
        <?php endif; ?>

        <!-- end .postmain -->
        </div>
        <!-- .post-sidebar -->
        <div class="col-md-4" style="padding-right:0px;">
            <div class="post-sidebar">
                <div class="post-sidebar-box">

                    <h3><?php echo config('siteconfig.morebyartist_mpage')?> {{ $artist_title }}</h3>
                    <ul class="side-itemlist">
                        <?php
                        $site_url = config('siteconfig.site_url');
                        $data_al = file_get_contents('https://itunes.apple.com/lookup?id='.$response->results[0]->artistId.'&entity=software');
                        $response_al = json_decode($data_al);

                        if (isset($response_al->results) and $response_al->results == true){
                            foreach ($response_al->results as $result_al)
                            {
                                if ($result_al->wrapperType == 'software') {
                                    echo '<li class="side-item"><div class="side-thumb"><a href="'.$site_url.'/app/'.$result_al->trackId.'/'.$result_al->trackName.'"><img data-src="'.$result_al->artworkUrl100.'" src="'.$site_url.'/public/images/loading.svg" ></a></div>
	<div class="info"><h3><a href="'.$site_url.'/app/'.$result_al->trackId.'/'.$result_al->trackName.'">'.$result_al->trackName.'</a></h3>
		<h4>'.$result_al->artistName.'</h4>';
                                    if (isset($result_al->averageUserRating) and $result_al->averageUserRating == true){
                                        echo '<div class="starbox"><span class="stars">'.$result_al->averageUserRating.'</span></div>';
                                    }
                                    echo '</div>
	</li>';
                                }
                            }
                        }
                        ?>
                    </ul>

                </div>

            </div>
        </div>
        <!-- end .post-sidebar -->
    </div>
@endif



<script type="text/javascript" src="{!! asset('public/js/bigstar-rating.js') !!}"></script>
<script type="text/javascript">
    jQuery(function() {
        jQuery('span.bigstars').bigstars();
    });
</script>
<script type="text/javascript" src="{!! asset('public/js/star-rating.js') !!}"></script>
<script type="text/javascript">
    jQuery(function() {
        jQuery('span.stars').stars();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });
</script>
<script src="<?php echo config('siteconfig.site_url')?>/public/js/imglazyload.js"></script>
<script>
    //lazy loading
    $('.container img').imgLazyLoad({
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