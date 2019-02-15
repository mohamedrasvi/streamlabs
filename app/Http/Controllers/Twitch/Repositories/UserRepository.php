<?php

namespace App\Http\Controllers\Twitch\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Twitch\Models\User;
use App\Http\Controllers\Twitch\Models\Streamers;
use Illuminate\Http\Request;
use \romanzipp\Twitch\Twitch;


class UserRepository
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    /**
     * @object $user
     * insert
     * @return void
     **/
    public function save($user)
    {
        try {
            $userExists = User::where('twitch_id', '=', $user->id)->first();
            if ($userExists) {
                Auth::loginUsingId($userExists->id);
                return ['home' => true];
            }

            $inserted = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'twitch_id' => $user->id,
            ]);
            Auth::loginUsingId($inserted->id);

            if (Auth::check()) {
                $userId = Auth::id();
                $streamer = Streamers::where('users_id', '=', $userId)->first();
                if ($streamer) {
                    return ['home' => true];
                }
            }
            return ['streamer' => true];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Request $request
     * insert
     * @return void
     **/
    public function saveStreamer(Request $request)
    {
        try {
            //check already has one streamer
            $userId = Auth::id();
            $streamer = Streamers::where('users_id', '=',$userId)->first();
            if(is_null($streamer)) {
                // Get User by Username
                $twitch = new Twitch();
                $userResult = $twitch->getUserByName($request->streamer);

                // Check, if the query was successfull
                if ($userResult->success()) {
                    // Shift result to get single user data
                    $user = $userResult->shift();

                    Streamers::create([
                        'name' => $user->id,
                        'twitch_id' => $user->id,
                        'users_id' => $userId,
                    ]);
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    /**
     * Twitch $twitch
     * get videos
     * @return void
     **/
    public function getVideos()
    {
        try {
            //check already has one streamer
            $userId = Auth::id();
            $streamer = Streamers::where('users_id', '=',$userId)->first();
            if(!is_null($streamer)) {
                // Get videos by Username
                $twitch = new Twitch();
                $data = array();
                $param = ['status'=>'recorded','sort'=> 'time'];
                $userResult = $twitch->getVideosByUser($streamer->twitch_id,$param);

                // Check, if the query was successfull
                if ($userResult->success()) {
                    foreach ($userResult->data as $index => $resuls){
                        if($index == 10){break;}
                        $data[] = $resuls;
                    }
                    return $data;
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

}
