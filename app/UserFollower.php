<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class UserFollower extends Model
{
    protected $table = 'user_followers';

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * Getting all follower count of user
     * @param $user_id
     * @return mixed
     */
    public function getFollowerCount($user_id){
        return DB::table('user_followers')->where('user_id','=', $user_id)->count();
    }

    /**
     * Checing if particular user is following or not
     * @param $follower_id
     * @param $user_id
     * @return mixed
     */
    public function getFollowingOrNot($follower_id,$user_id){
        return DB::table('user_followers')->where('follower_id','=', $user_id)->where('user_id','=', $follower_id)->count();
    }

    /**
     * adding followe to particular user
     * @param $user_id
     * @param $follower_id
     */
    public function addFollower($user_id,$follower_id){
        $this->user_id = $user_id;
        $this->follower_id = $follower_id;
        $this->save();
        return;
    }
}
