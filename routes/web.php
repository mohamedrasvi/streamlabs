<?php

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
use Illuminate\Support\Facades\Auth;

Route::get('/','Twitch\LoginTwitchController@redirectToProvider');
Route::get('login/twitch/callback', 'Twitch\LoginTwitchController@handleProviderCallback');

//home page
Route::get('home', function () {
    $data = app(App\Http\Controllers\Twitch\Repositories\UserRepository::class)->getVideos();
    return View('welcome')->with('data',$data);})->middleware('auth');

Route::get('logout', function () {
        Auth::logout();
        echo 'Logout Successfully';
    });

Route::get('streamer', 'Twitch\LoginTwitchController@getStreamer')->middleware('auth');
Route::post('streamer', 'Twitch\LoginTwitchController@addStreamer')->middleware('auth')->name('streamer');
