<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User\UserContract;
use Auth;
use Illuminate\Http\Request;

class AdminProfileaController extends Controller
{
    private static $userClass;
    public function __construct(UserContract $userContract){
        self::$userClass=$userContract;
    }
    public function Index(){
        $userInfo=self::$userClass->GetUser(Auth::id());
        return view("Admin.Profile.index",["profile" => $userInfo]);
    }
    public function Update(UserRequest $request){
        self::$userClass->Update($request,Auth::id());
        return redirect()->route("adminProfilePage")->with(["status" => 200,"message" => "پروفایل شما با موفقیت ویرایش شد"]);
    }
}
