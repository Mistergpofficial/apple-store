<?php

namespace App\Http\Controllers;

use App\Models\LatestApps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LatestAppsController extends Controller
{



    public function newApps(){
        $latestapps = LatestApps::all();
        if(count($latestapps) === 0){
            $site_country = config('siteconfig.site_country');
            $string1 = file_get_contents('https://itunes.apple.com/'.$site_country.'/rss/newapplications/limit=100/xml');
            // Remove the colon ":" in the <xxx:yyy> to be <xxxyyy>
            $string1 = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $string1);
            $xmll = simplexml_load_string($string1);

            // Output
            $rssresults = '';
            foreach ($xmll->entry as $val) {
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
                $version = $val->imversion;
//                $catid2 = str_replace("/id/", "xxx", $catid2);
//                $catid2 = explode('/id', $catid2);
//                $catid2 = explode('?', $catid2[1]);
                $bigimage1 = preg_replace('/100x100/ms', "150x150", $val->imimage[2]);
                DB::table('latest_apps')->insert([
                    'bigimage1' => $bigimage1,
                    'musicid1' => json_encode($musicid1),
                    'musicid2' => $musicid1[0],
                    'catid1' => json_encode($catid1),
                    'label' => $catid2,
                    'imname1' => $imname1,
                    'imartist1' => $imartist1,
                    'release_date' =>  $releaseDateo,
                    'version' =>  $version
                ]);

            }

            return view('newapps_main',compact('latestapps', 'xmll'));

        }else{
            return view('newapps_main', compact('latestapps'));
        }
    }



}
