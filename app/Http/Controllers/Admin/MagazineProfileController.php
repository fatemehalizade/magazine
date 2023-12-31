<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaganizeProfileRequest;
use App\Profile\ProfileContract;
use Illuminate\Http\Request;

class MagazineProfileController extends Controller
{
    private static $profileClass;
    public function __construct(ProfileContract $profileContract){
        self::$profileClass=$profileContract;
    }
    public function Index(){
        $profile=self::$profileClass->ProfileInfo();
        return view("Admin.Profile.index",["profile" => $profile]);
    }
    public function Update(MaganizeProfileRequest $request){
        self::$profileClass->Update($request);
        return redirect()->route("magazineProfilePage")->with([
            "status" => 200,"message" => "پروفایل وبسایت با موفقیت ویرایش شد"
        ]);
    }
}
