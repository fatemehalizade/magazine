<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialMediaRequest;
use App\SocialMedia\SocialMediaContract;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    private static $socialMediaClass;
    public function __construct(SocialMediaContract $socialMediaContract){
        self::$socialMediaClass=$socialMediaContract;
    }
    public function Index(Request $request){
        $socialMedias=self::$socialMediaClass->GetSocialMedias();
        return view("Admin.SocialMedia.index",["socialMedias" => $socialMedias]);
    }
    public function EditPage($id){
        $SocialMediaInfo=self::$socialMediaClass->GetSocialMedia($id);
        return view("Admin.SocialMedia.edit",["SocialMediaInfo" => $SocialMediaInfo]);
    }
    public function Update(SocialMediaRequest $request,$id){
        self::$socialMediaClass->Update($request,$id);
        return redirect()->route("editSocialMediaPage")->with(["status" => 200,"message" => "شبکه اجتماعی با موفقیت ویرایش شد"]);
    }
    public function CreatePage(){
        return view("Admin.SocialMedia.create");
    }
    public function Create(SocialMediaRequest $request){
        self::$socialMediaClass->Create($request);
        return redirect()->route("createSocialMediaPage")->with(["status" => 200,"message" => "شبکه اجتماعی با موفقیت ثبت شد"]);
    }
    public function Delete($id){
        self::$socialMediaClass->Delete($id);
        return redirect()->route("allSocialMedias")->with(["status" => 200,"message" => "شبکه اجتماعی با موفقیت حذف شد"]);
    }
}
