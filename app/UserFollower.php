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

    public function getFollowerCount($user_id){
        return DB::table('user_followers')->where('user_id','=', $user_id)->count();
    }

    public function getFollowingOrNot($follower_id,$user_id){
        return DB::table('user_followers')->where('follower_id','=', $follower_id)->where('user_id','=', $user_id)->count();
    }

    public function addFollower($user_id,$follower_id){
        $this->user_id = $user_id;
        $this->follower_id = $follower_id;
        $this->save();
        return;
    }
}
