<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userFollowers()
    {
        return $this->hasMany('App\UserFollower');
    }

    public function getAllUser($user_id)
    {
        return DB::table('users')->where('id','!=', $user_id)->select('id','name')->get();
    }

}
