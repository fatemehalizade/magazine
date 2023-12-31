<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User\UserContract;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private static $userClass;
    public function __construct(UserContract $userContract){
        self::$userClass=$userContract;
    }
    // public function Index(){
    //     return view("register");
    // }
    public function Register(UserRequest $request){
        self::$userClass->Create($request);
        return redirect()->route("registerPage")->with([
            "status" => 200,"message" => "ثبت نام شما با موفقیت انجام شد"
        ]);
    }
}
