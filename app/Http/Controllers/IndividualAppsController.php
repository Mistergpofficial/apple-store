<?php

namespace App\Http\Controllers;

use App\Models\CustomerReviews;
use App\Models\Extra;
use App\Models\IndividualApps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndividualAppsController extends Controller
{

    public function showLatestAppsByID($musicid1, $imname){
        $musicid = $musicid1;
        $individualapps = IndividualApps::where('musicid', $musicid)->get();
        $customerReviews = CustomerReviews::where('musicid', $musicid)->take(11)->get();
        $extras = Extra::where('musicid', $musicid)->get();

        $site_country = config('siteconfig.site_country');
        $jsonurl = "https://itunes.apple.com/$site_country/rss/customerreviews/page=1/id=$musicid/sortBy=mostRecent/json";
        $json = file_get_contents($jsonurl,0,null,null);
        $json_output = json_decode($json);

        $counter = 0;
        $max = 21;
        $label = '';
        $rating = '';
        $author = '';
        $content = '';

        if(!empty($json_output->feed->entry)){
            foreach($json_output->feed->entry as $ent ){
              //  if ($counter++ == 0) continue;
              //  if ($counter < $max) {
                if (isset($ent->title->label) && $ent->title->label === true){
                    $label = $ent->title->label;
                }
                if (isset($ent->{'im:rating'}->label) && $ent->{'im:rating'}->label === true){
                    $rating = $ent->{'im:rating'}->label;
                }
                if (isset($ent->author->name->label) && $ent->author->name->label === true){
                    $author = $ent->author->name->label;
                }
                if (isset($ent->content->label) && $ent->content->label === true){
                    $content = $ent->content->label;
                }



             //   }
             //    $counter++;

                DB::table('customer_reviews')->insert([
                    'musicid' => $musicid,
                    'label' => $label,
                    'rating' => $rating,
                    'author' => $author,
                    'content' => $content
                ]);
            }
        }else{
            echo '';
        }

        if(count($individualapps) === 0){
            $site_country = config('siteconfig.site_country');
            $musicid = $musicid1;
        $data = file_get_contents('https://itunes.apple.com/lookup?id='.$musicid.'&limit=1&entity=software&country='.$site_country.'');
        $response = json_decode($data);
            if ($response->resultCount == '0') {
            $data = file_get_contents('https://itunes.apple.com/lookup?id='.$musicid.'&limit=1&entity=software');
            $response = json_decode($data);
        }
        $averageUserRating = '';
            $userRatingCounting = '';
            $sellerUrl = '';
            $formattedPrice = '';
        $item_title = $response->results[0]->trackName;
        $artist_id = $response->results[0]->artistId;
        $artist_title = $response->results[0]->artistName;
        //$coll_title = $response->results[0]->trackName;
        $genre_title = $response->results[0]->primaryGenreName;
        $main_image = preg_replace('/100x100bb.jpg/ms', "200x200bb.jpg", $response->results[0]->artworkUrl100);
        $geo_link = preg_replace('/itunes/ms', "geo.itunes", $response->results[0]->trackViewUrl);
        $releaseDate = substr($response->results[0]->releaseDate,0,10);
        $version = $response->results[0]->version;
        $contentAdvisoryRating = $response->results[0]->contentAdvisoryRating;
        $fileSizeBytes = $response->results[0]->fileSizeBytes;
        $genreIds = $response->results[0]->genreIds;
        $minimumOsVersion = $response->results[0]->minimumOsVersion;
        if (isset($response->results[0]->sellerUrl) and $response->results[0]->sellerUrl == true){
            $sellerUrl = $response->results[0]->sellerUrl;
        }
        if(isset($response->results[0]->averageUserRating) and !empty($response->results[0]->averageUserRating)){
            $averageUserRating = $response->results[0]->averageUserRating;
        }
        if(isset($response->results[0]->userRatingCount) and !empty($response->results[0]->userRatingCount)){
            $userRatingCounting = $response->results[0]->userRatingCount;
        }
            if(isset($response->results[0]->formattedPrice) and !empty($response->results[0]->formattedPrice)){
                $formattedPrice = $response->results[0]->formattedPrice;
            }
       // $formattedPrice = $response->results[0]->formattedPrice;
        $description = $response->results[0]->description;
        $screenshots = $response->results[0]->screenshotUrls;
            DB::table('individual_apps')->insert([
                    'track_name' => $item_title,
                    'artist_id' => json_encode($artist_id),
                    'artist_name' => $artist_title,
                    'genre_title' => $genre_title,
                    'image' => $main_image,
                    'geo_link' => $geo_link,
                    'release_date' => $releaseDate,
                    'version' => $version,
                    'content_advisory' =>  $contentAdvisoryRating,
                    'file_size_bytes' =>  $fileSizeBytes,
                    'genre_ids' =>  json_encode($genreIds),
                    'minimum_os_version' =>  $minimumOsVersion,
                    'seller_url' => $sellerUrl,
                    'average_user_rating' => $averageUserRating,
                    'user_rating_counting' => $userRatingCounting,
                   'formatted_price' => $formattedPrice,
                   'description' => $description,
                    'screenshots' => json_encode($screenshots),
                'musicid' => $musicid
                ]);

            $artist_id = $response->results[0]->artistId;
            $data_al = file_get_contents('https://itunes.apple.com/lookup?id='.$artist_id.'&entity=software');
            $response_al = json_decode($data_al);
            $averageUserRating1 = "";
            $track_id = '';
            $track_name = "";
            $artist_name = "";
            $art_work_url = "";
            if (isset($response_al->results) and $response_al->results === true) {
                foreach ($response_al->results as $result_al) {
                    if ($result_al->wrapperType == 'software') {
                        $track_id = $result_al->trackId;
                        $art_work_url = $result_al->artworkUrl100;
                        $track_name = $result_al->trackName;
                        $artist_name = $result_al->artistName;
                        if (isset($result_al->averageUserRating) and $result_al->averageUserRating == true){
                            $averageUserRating1 = $result_al->averageUserRating;
                        }
                        DB::table('extras')->insert([
                            'track_name' => $track_name,
                            'track_id' => $track_id,
                            'artist_name' => $artist_name,
                            'art_work_url' => $art_work_url,
                            'average_user_rating' => $averageUserRating1,
                            'musicid' => $musicid
                        ]);
                    }
                }
            }

            return view('app_main', compact('item_title', 'artist_id', 'individualapps','extras', 'customerReviews', 'artist_title', 'coll_title', 'genre_title', 'main_image', 'geo_link', 'releaseDate', 'fileSizeBytes', 'version', 'contentAdvisoryRating', 'genreIds', 'response', 'minimumOsVersion', 'musicid', 'geo_link', 'averageUserRating', 'userRatingCounting', 'json_output', 'max', 'counter', 'label', 'rating', 'author', 'content'));


        }else{
            $musicid = $musicid1;
            $counter = 0;
            $max = 21;
            return view('app_main', compact('individualapps', 'musicid', 'extras', 'customerReviews', 'counter', 'max'));
        }
    }

}
