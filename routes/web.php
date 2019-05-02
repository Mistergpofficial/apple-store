<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'UserController@ind');
Route::get('/dmca', 'DmcaController@dmca');
Route::get('/contact', 'ContactController@getContact');
Route::post('/contact', 'ContactController@postContact');
Route::get('/privacy', 'PrivacyController@privacy');
Route::get('/new-apps', 'LatestAppsController@newApps');
Route::get('/app/{musicid1}/{imname}', 'IndividualAppsController@showLatestAppsByID');
Route::get('/new-free-apps', 'FreeAppsController@newFreeApps');
Route::get('/new-paid-apps', 'PaidAppsController@newPaidApps');
Route::get('/category/{genreid1}/{imname}', 'CategoryController@category');
Route::get('/top-free-apps', 'TopFreeAppsController@topFreeApps');
Route::get('/top-grossing-apps', 'TopGrossAppsController@topAppGross');
Route::get('/top-paid-apps', 'TopPaidAppsController@topPaidApps');
//Route::post('/search', 'SearchController@search')->name('search');
Route::get('search/{searching}', 'SearchController@search')->name('search');
//Route::get('/search/{search}', ['as' => 'searchByAppName', 'uses' => 'SearchController@search']);
