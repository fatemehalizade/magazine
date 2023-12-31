<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post\PostContract;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private static $postClass;
    public function __construct(PostContract $postContract){
        self::$postClass=$postContract;
    }
    public function Index(Request $request){
        $posts=self::$postClass->GetPosts();
        return view("Admin.Post.index",["posts" => $posts]);
    }
    public function EditPage($id){
        $postInfo=self::$postClass->GetPost($id);
        return view("Admin.Post.edit",["postInfo" => $postInfo]);
    }
    public function Update(PostRequest $request,$id){
        self::$postClass->Update($request,\Auth::id(),$id);
        return redirect()->route("editPostPage")->with(["status" => 200,"message" => "پست با موفقیت ویرایش شد"]);
    }
    public function CreatePage(){
        return view("Admin.Post.create");
    }
    public function Create(postRequest $request){
        self::$postClass->Create($request,\Auth::id());
        return redirect()->route("createpostPage")->with(["status" => 200,"message" => "پست با موفقیت ثبت شد"]);
    }
    public function DetermineStatus($id,$status){
        self::$postClass->DetermineStatus($id,$status);
        return redirect()->route("allPosts");
    }
    public function Delete($id){
        self::$postClass->Delete($id);
        return redirect()->route("allPosts")->with(["status" => 200,"message" => "پست با موفقیت حذف شد"]);
    }
}
