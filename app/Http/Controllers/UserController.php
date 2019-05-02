<?php

namespace App\Http\Controllers;


use App\Models\FeaturedApps;
use App\Models\LatestApps;
use App\Models\TopGrossApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function ind()
    {
        $topgrossapps = TopGrossApp::all();
        $featuredapps = FeaturedApps::all();
        $latestapps = LatestApps::all();
        if(count($topgrossapps) === 0){
            if(count($featuredapps) === 0)
                if(count($latestapps) === 0)

                    // top gross applications
                    $homeapps_genre_id = config('siteconfig.homeapps_genre_id');
                    $site_country = config('siteconfig.site_country');
                    if (!empty($homeapps_genre_id)) {
                        $string = file_get_contents('https://itunes.apple.com/' . $site_country . '/rss/topgrossingapplications/limit=10/genre=' . $homeapps_genre_id . '/xml');
                    } else {
                        $string = file_get_contents('https://itunes.apple.com/' . $site_country . '/rss/topgrossingapplications/limit=10/xml');
                    }
                    $string = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $string);
                    $xml = simplexml_load_string($string);

                    foreach ($xml->entry as $val) {
                        // edit foreach
                        $imname = $val->imname;
                        $musicid = $val->id;
                        $musicid = str_replace("/id/", "xxx", $musicid);
                        $musicid = explode('/id', $musicid);
                        $musicid = explode('?', $musicid[1]);
                        $bigimage = preg_replace('/100x100/ms', "180x180", $val->imimage[2]);
                        \Illuminate\Support\Facades\DB::table('top_gross_apps')->insert([
                            'bigimage' => $bigimage,
                            'musicid' => json_encode($musicid),
                            'imname' => $imname
                        ]);
                    }

                    // featured apps
                    $featapp_id1 = config('siteconfig.featapp_id1');
                    $featapp_id2 = config('siteconfig.featapp_id2');
                    $featapp_id3 = config('siteconfig.featapp_id3');
                    $featapp_id4 = config('siteconfig.featapp_id4');
                    $featapp_id5 = config('siteconfig.featapp_id5');
                    $featapp_id6 = config('siteconfig.featapp_id6');
                    $site_country = config('siteconfig.site_country');
                    $data1 = file_get_contents('https://itunes.apple.com/lookup?id=' . $featapp_id1 . '&entity=software&country=' . $site_country . '');
                    $data2 = file_get_contents('https://itunes.apple.com/lookup?id=' . $featapp_id2 . '&entity=software&country=' . $site_country . '');
                    $data3 = file_get_contents('https://itunes.apple.com/lookup?id=' . $featapp_id3 . '&entity=software&country=' . $site_country . '');
                    $data4 = file_get_contents('https://itunes.apple.com/lookup?id=' . $featapp_id4 . '&entity=software&country=' . $site_country . '');
                    $data5 = file_get_contents('https://itunes.apple.com/lookup?id=' . $featapp_id5 . '&entity=software&country=' . $site_country . '');
                    $data6 = file_get_contents('https://itunes.apple.com/lookup?id=' . $featapp_id6 . '&entity=software&country=' . $site_country . '');
                    $response1 = json_decode($data1);
                    $response2 = json_decode($data2);
                    $response3 = json_decode($data3);
                    $response4 = json_decode($data4);
                    $response5 = json_decode($data5);
                    $response6 = json_decode($data6);

                    // output for featapp_id1
                    $artist_title1 = $response1->results[0]->artistName;
                    $coll_title1 = $response1->results[0]->trackName;
                    $main_image1 = preg_replace('/100x100bb.jpg/ms', "180x180bb.jpg", $response1->results[0]->artworkUrl100);
                    $trackId1 = $response1->results[0]->trackId;
                    $averageUserRating1 = $response1->results[0]->averageUserRating;
                    $userRatingCounting1 = $response1->results[0]->userRatingCount;
                    $releaseDate1 = $response1->results[0]->releaseDate;
                    $genres1 = $response1->results[0]->genres[0];
                    $description1 = $response1->results[0]->description;
                    DB::table('featured_apps')->insert([
                        'artist_name' => $artist_title1,
                        'track_name' => $coll_title1,
                        'image' => $main_image1,
                        'track_id' => $trackId1,
                        'average_user_rating' => $averageUserRating1,
                        'user_rating_counting' => $userRatingCounting1,
                        'release_date' => $releaseDate1,
                        'genres' => $genres1,
                        'description' => $description1
                    ]);
                    // output for featapp_id2
                    $artist_title2 = $response2->results[0]->artistName;
                    $coll_title2 = $response2->results[0]->trackName;
                    $main_image2 = preg_replace('/100x100bb.jpg/ms', "180x180bb.jpg", $response2->results[0]->artworkUrl100);
                    $trackId2 = $response2->results[0]->trackId;
                    $averageUserRating2 = $response2->results[0]->averageUserRating;
                    $userRatingCounting2 = $response2->results[0]->userRatingCount;
                    $releaseDate2 = $response2->results[0]->releaseDate;
                    $genres2 = $response2->results[0]->genres[0];
                    $description2 = $response2->results[0]->description;
                    DB::table('featured_apps')->insert([
                        'artist_name' => $artist_title2,
                        'track_name' => $coll_title2,
                        'image' => $main_image2,
                        'track_id' => $trackId2,
                        'average_user_rating' => $averageUserRating2,
                        'user_rating_counting' => $userRatingCounting2,
                        'release_date' => $releaseDate2,
                        'genres' => $genres2,
                        'description' => $description2
                    ]);
                    // output for featapp_id3
                    $artist_title3 = $response3->results[0]->artistName;
                    $coll_title3 = $response3->results[0]->trackName;
                    $main_image3 = preg_replace('/100x100bb.jpg/ms', "180x180bb.jpg", $response3->results[0]->artworkUrl100);
                    $trackId3 = $response3->results[0]->trackId;
                    $averageUserRating3 = $response3->results[0]->averageUserRating;
                    $userRatingCounting3 = $response3->results[0]->userRatingCount;
                    $releaseDate3 = $response3->results[0]->releaseDate;
                    $genres3 = $response3->results[0]->genres[0];
                    $description3 = $response3->results[0]->description;
                    DB::table('featured_apps')->insert([
                        'artist_name' => $artist_title3,
                        'track_name' => $coll_title3,
                        'image' => $main_image3,
                        'track_id' => $trackId3,
                        'average_user_rating' => $averageUserRating3,
                        'user_rating_counting' => $userRatingCounting3,
                        'release_date' => $releaseDate3,
                        'genres' => $genres3,
                        'description' => $description3
                    ]);
                    // output for featapp_id4
                    $artist_title4 = $response4->results[0]->artistName;
                    $coll_title4 = $response4->results[0]->trackName;
                    $main_image4 = preg_replace('/100x100bb.jpg/ms', "180x180bb.jpg", $response4->results[0]->artworkUrl100);
                    $trackId4 = $response4->results[0]->trackId;
                    $averageUserRating4 = $response4->results[0]->averageUserRating;
                    $userRatingCounting4 = $response4->results[0]->userRatingCount;
                    $releaseDate4 = $response4->results[0]->releaseDate;
                    $genres4 = $response4->results[0]->genres[0];
                    $description4 = $response4->results[0]->description;
                    DB::table('featured_apps')->insert([
                        'artist_name' => $artist_title4,
                        'track_name' => $coll_title4,
                        'image' => $main_image4,
                        'track_id' => $trackId4,
                        'average_user_rating' => $averageUserRating4,
                        'user_rating_counting' => $userRatingCounting4,
                        'release_date' => $releaseDate4,
                        'genres' => $genres4,
                        'description' => $description4
                    ]);
                    // output for featapp_id5
                    $artist_title5 = $response5->results[0]->artistName;
                    $coll_title5 = $response5->results[0]->trackName;
                    $main_image5 = preg_replace('/100x100bb.jpg/ms', "180x180bb.jpg", $response5->results[0]->artworkUrl100);
                    $trackId5 = $response5->results[0]->trackId;
                    $averageUserRating5 = $response5->results[0]->averageUserRating;
                    $userRatingCounting5 = $response5->results[0]->userRatingCount;
                    $releaseDate5 = $response5->results[0]->releaseDate;
                    $genres5 = $response5->results[0]->genres[0];
                    $description5 = $response5->results[0]->description;
                    DB::table('featured_apps')->insert([
                        'artist_name' => $artist_title5,
                        'track_name' => $coll_title5,
                        'image' => $main_image5,
                        'track_id' => $trackId5,
                        'average_user_rating' => $averageUserRating5,
                        'user_rating_counting' => $userRatingCounting5,
                        'release_date' => $releaseDate5,
                        'genres' => $genres5,
                        'description' => $description5
                    ]);
                    // output for featapp_id6
                    $artist_title6 = $response6->results[0]->artistName;
                    $coll_title6 = $response6->results[0]->trackName;
                    $main_image6 = preg_replace('/100x100bb.jpg/ms', "180x180bb.jpg", $response6->results[0]->artworkUrl100);
                    $trackId6 = $response6->results[0]->trackId;
                    $averageUserRating6 = $response6->results[0]->averageUserRating;
                    $userRatingCounting6 = $response6->results[0]->userRatingCount;
                    $releaseDate6 = $response6->results[0]->releaseDate;
                    $genres6 = $response6->results[0]->genres[0];
                    $description6 = $response6->results[0]->description;
                    DB::table('featured_apps')->insert([
                        'artist_name' => $artist_title6,
                        'track_name' => $coll_title6,
                        'image' => $main_image6,
                        'track_id' => $trackId6,
                        'average_user_rating' => $averageUserRating6,
                        'user_rating_counting' => $userRatingCounting6,
                        'release_date' => $releaseDate6,
                        'genres' => $genres6,
                        'description' => $description6
                    ]);


                    // latest apps

                    $string1 = file_get_contents('https://itunes.apple.com/' . $site_country . '/rss/newapplications/limit=100/xml');
                    // Remove the colon ":" in the <xxx:yyy> to be <xxxyyy>
                    $string1 = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $string1);
                    $xmll = simplexml_load_string($string1);
                   // $xmll = $xmll->paginate(10);

                    // Output
                    $rssresults = '';
                    foreach ($xmll->entry as $val) {
                      //  $val = $val->paginate(20);
                        // edit foreach
                        $imname1 = $val->imname;
                        $imartist1 = $val->imartist;
                        $musicid1 = $val->id;
                        $musicid1 = str_replace("/id/", "xxx", $musicid1);
                        $musicid1 = explode('/id', $musicid1);
                        $musicid1 = explode('?', $musicid1[1]);
                        $catid1 = $val->category->attributes()->scheme;
                        $catid1 = str_replace("/id/", "xxx", $catid1);
                        $catid1 = explode('/id', $catid1);
                        $catid1 = explode('?', $catid1[1]);
                        $catid2 = $val->category->attributes()->label;
                        $releaseDateo = $val->imreleaseDate;


                        $bigimage1 = preg_replace('/100x100/ms', "150x150", $val->imimage[2]);
                        \Illuminate\Support\Facades\DB::table('latest_apps')->insert([
                            'bigimage1' => $bigimage1,
                            'musicid1' => json_encode($musicid1),
                            'musicid2' => json_encode($musicid1[0]),
                            'catid1' => json_encode($catid1),
                            'label' => $catid2,
                            'imname1' => $imname1,
                            'imartist1' => $imartist1,
                            'release_date' =>  $releaseDateo,
                        ]);

                    }

                    return view('index', compact('topgrossapps', 'xml', 'musicid1', 'xmll', 'latestapps', 'featuredapps', 'artist_title1', 'coll_title1', 'main_image1', 'trackId1', 'averageUserRating1', 'userRatingCounting1', 'releaseDate1', 'genres1', 'description1', 'artist_title2', 'coll_title2', 'main_image2', 'trackId2', 'averageUserRating2', 'userRatingCounting2', 'releaseDate2', 'genres2', 'description2', 'artist_title3', 'coll_title3', 'main_image3', 'trackId3', 'averageUserRating3', 'userRatingCounting3', 'releaseDate3', 'genres3', 'description3', 'artist_title4', 'coll_title4', 'main_image4', 'trackId4', 'averageUserRating4', 'userRatingCounting4', 'releaseDate4', 'genres4', 'description4', 'artist_title5', 'coll_title5', 'main_image5', 'trackId5', 'averageUserRating5', 'userRatingCounting5', 'releaseDate5', 'genres5', 'description5', 'artist_title6', 'coll_title6', 'main_image6', 'trackId6', 'averageUserRating6', 'userRatingCounting6', 'releaseDate6', 'genres6', 'description6'));

        }else{
            return view('index', compact('topgrossapps', 'featuredapps', 'latestapps'));
        }
    }









}

