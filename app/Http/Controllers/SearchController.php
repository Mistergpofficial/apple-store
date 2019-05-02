<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search($searching){
        $site_country = config('siteconfig.site_country');
        //$searchData1 = request()->input('q');
        $searchData1 = $searching;
        $searchData = explode(' ',trim($searchData1));
        $searchData = $searchData[0];
        $track_name2 = Search::where('track_name2', strtoupper($searchData))->first();
        $search = Search::where('search_data', $searchData)->get();
       // $user = $id;
        if(count($search) === 0 && count($track_name2)=== 0) {
            //start query for search
            $data_al = file_get_contents('https://itunes.apple.com/search?term=' . $searchData . '&entity=software&country=' . $site_country . '');
            $response_al = json_decode($data_al);
            if (isset($response_al->results) && $response_al->results == true) {
                foreach ($response_al->results as $result_al) {
                    $track_id = $result_al->trackId;
                    $bigimage = preg_replace('/100x100bb/ms', "150x150bb", $result_al->artworkUrl100);
                    $track_name = $result_al->trackName;
                    $track_name2 = explode(' ', trim($track_name));
                    $track_name2 = $track_name2[0];
                    $artist_name = $result_al->artistName;
                    $primary_genre_id = $result_al->primaryGenreId;
                    $primary_genre_name = $result_al->primaryGenreName;
                    $description = $result_al->description;

                    DB::table('searches')->insert([
                        'search_data' => $searchData,
                        'track_name' => $track_name,
                        'track_name2' => $track_name2,
                        'track_id' => $track_id,
                        'artist_name' => $artist_name,
                        'image' => $bigimage,
                        'primary_genre_id' => $primary_genre_id,
                        'primary_genre_name' => $primary_genre_name,
                        'description' => $description
                    ]);
                    $search = Search::where('search_data', $searchData)->get();
                }
            } else {
                echo '';
            }
           return view('search_main', compact('search', 'searchData1', 'user'));
        }else{
            $searchData1 = $searching;
            $searchData = explode(' ',trim($searchData1));
            $searchData = $searchData[0];
            return view('search_main',compact('search', 'searchData1', 'user'));
        }

    }




}
