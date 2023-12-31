<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Message\MessageContract;
use App\Profile\ProfileContract;
use App\SocialMedia\SocialMediaContract;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private static $profileClass,$socialMediaClass,$messageClass;
    public function __construct(ProfileContract $profileContract,SocialMediaContract $socialMediaContract,MessageContract $messageContract){
        self::$profileClass=$profileContract;
        self::$socialMediaClass=$socialMediaContract;
        self::$messageClass=$messageContract;
    }
    public function Index(){
        $profileInfo=self::$profileClass->ProfileInfo();
        $socialMedias=self::$socialMediaClass->GetSocialMedias();
        return view("contact",[
            "profile" => $profileInfo,
            "socialMedias" => $socialMedias,
        ]);
    }
    public function Create(MessageRequest $messageRequest){
        self::$messageClass->Create($messageRequest);
        return redirect()->route("contactPage")->with("message","پیامتان با موفقیت ثبت شد");
    }
}
