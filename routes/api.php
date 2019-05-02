<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*Route::get('/teachers', function () {
   return User::where('is_teacher', 2)->get();

});*/
Route::get('/teachers', 'ApiController@obtainTeachers');
Route::get('/classes', 'ApiController@obtainClasses');
Route::get('/section', 'ApiController@obtainSection');
Route::get('/section2', 'ApiController@obtainSection2');
Route::get('/subject', 'ApiController@obtainSubject');
/*Route::get('/user', 'ApiController@obtainUser');*/
//Route::get('/statuses', 'ApiController@obtainStatus');