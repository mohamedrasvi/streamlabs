<?php

namespace App\Http\Controllers\Twitch;

use App\Http\Controllers\Controller;
use Socialite;
use App\Http\Controllers\Twitch\Repositories\UserRepository;
use Illuminate\Http\Request;

class LoginTwitchController extends Controller
{
    /**
     * Redirect the user to the Twitch authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::with('twitch')->stateless()->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return void
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('twitch')->stateless()->user();
        $result = app(UserRepository::class)->save($user);
        if(isset($result['home'])){
            return redirect('/home');
        }
        if(isset($result['streamer'])) {
            return redirect('/streamer');
        }
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function addStreamer(Request $request)
    {
        app(UserRepository::class)->saveStreamer($request);
        return redirect('/home');
    }

    public function getStreamer()
    {
        return view('stream');
    }
}
