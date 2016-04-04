<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\UserFollower;
use Illuminate\Http\Request;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userInfo = \Auth::user();
        $userObj = new User();
        $allUser = $userObj->getAllUser($userInfo->id);
        $userInfoArray = array();
        foreach($allUser as $user){
            $userInfoArray[$user->id]['id'] = $user->id;
            $userInfoArray[$user->id]['name'] = $user->name;
            $followerObj = new UserFollower();
            $userInfoArray[$user->id]['followerCount'] = $followerObj->getFollowerCount($user->id);
            $userInfoArray[$user->id]['following'] = $followerObj->getFollowingOrNot($user->id,$userInfo->id);
        }
        //print_r($userInfoArray);exit;
        return view('home',['userinfo'=>$userInfoArray]);
    }

    /**
     * Adding follower functionality
     * @param Request $request
     * @return array
     */
    public function follow(Request $request){
        $userInfo = \Auth::user();
        $data = $request->all();
        $followerObj = new UserFollower();
        $saveFollower = $followerObj->addFollower($data['follow_id'],$userInfo->id);
        $total_follower = $followerObj->getFollowerCount($data['follow_id']);
        $data['followerCount'] = $total_follower;
        return $data;
    }
}
