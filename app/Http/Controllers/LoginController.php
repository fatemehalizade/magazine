<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\User\UserContract;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private static $userClass;
    public function __construct(UserContract $userContract){
        self::$userClass=$userContract;
    }
    // public function Index(){
    //     return view("login");
    // }
    public function Login(LoginRequest $request){
        $checkUser=self::$userClass->CheckUser($request);
        if($checkUser){
            if(auth()->user()->role == "admin"){
                return redirect()->route("adminDashboardPage");
            }
            else{
                return redirect()->route("writerDashboardPage");
            }
        }
        else{
            return back()->with([
                "status" => 404,"message" => "نام کاربری یا رمزعبور اشتباه است"
            ]);
        }
    }
}
