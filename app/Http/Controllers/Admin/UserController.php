<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User\UserContract;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private static $userClass;
    public function __construct(UserContract $userContract){
        self::$userClass=$userContract;
    }
    public function Index(){
        $users=self::$userClass->GetUsers();
        return view("Admin.User.index",$users);
    }
    public function EditPage($id){
        $userInfo=self::$userClass->Getuser($id);
        return view("Admin.User.edit",["userInfo" => $userInfo]);
    }
    public function Update(UserRequest $request,$id){
        self::$userClass->Update($request,$id);
        return redirect()->route("editUserPage")->with(["status" => 200,"message" => "کاربر با موفقیت ویرایش شد"]);
    }
    public function CreatePage(){
        return view("Admin.User.create");
    }
    public function Create(userRequest $request){
        self::$userClass->Create($request);
        return redirect()->route("createUserPage")->with(["status" => 200,"message" => "کاربر با موفقیت ثبت شد"]);
    }
    public function Delete($id){
        self::$userClass->Delete($id);
        return redirect()->route("allUsers")->with(["status" => 200,"message" => "کاربر با موفقیت حذف شد"]);
    }
}
