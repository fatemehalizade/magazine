<?php

namespace App\Http\Controllers;

use App\Post\PostContract;
use App\Profile\ProfileContract;
use App\SocialMedia\SocialMediaContract;
use App\View\ViewContract;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private static $profileClass,$socialMediaClass,$postClass,$viewClass;
    public function __construct(ProfileContract $profileContract,SocialMediaContract $socialMediaContract,PostContract $postContract,ViewContract $viewContract){
        self::$profileClass=$profileContract;
        self::$socialMediaClass=$socialMediaContract;
        self::$postClass=$postContract;
        self::$viewClass=$viewContract;
    }
    public function Index(){
        $profileInfo=self::$profileClass->ProfileInfo();
        $socialMedias=self::$socialMediaClass->GetSocialMedias();
        $categories=self::$postClass->GetPostsCategory();
        $latestPosts=self::$postClass->GetLatestPost(5);
        $suggestedPosts=self::$postClass->GetSuggestedPost(5);
        $mostVisited=self::$viewClass->GetMostViews(5);
        return view("index",[
            "profile" => $profileInfo,
            "socialMedias" => $socialMedias,
            "categories" => $categories,
            "latestPosts" => $latestPosts,
            "suggestedPosts" => $suggestedPosts,
            "mostVisited" => $mostVisited
        ]);
    }
}
