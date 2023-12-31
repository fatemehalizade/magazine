<?php

namespace App\Http\Controllers;

use App\Profile\ProfileContract;
use App\SocialMedia\SocialMediaContract;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private static $profileClass,$socialMediaClass;
    public function __construct(ProfileContract $profileContract,SocialMediaContract $socialMediaContract){
        self::$profileClass=$profileContract;
        self::$socialMediaClass=$socialMediaContract;
    }
    public function Index(){
        $profileInfo=self::$profileClass->ProfileInfo();
        $socialMedias=self::$socialMediaClass->GetSocialMedias();
        return view("about",[
            "profile" => $profileInfo,
            "socialMedias" => $socialMedias,
        ]);
    }
}
