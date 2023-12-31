<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post\PostContract;
use Illuminate\Http\Request;

class WriterPostController extends Controller
{
    private static $postClass;
    public function __construct(PostContract $postContract){
        self::$postClass=$postContract;
    }
    public function Index(Request $request){
        $posts=self::$postClass->GetUserPost(\Auth::id());
        return view("Admin.Post.index",["posts" => $posts]);
    }
    public function EditPage($id){
        $postInfo=self::$postClass->GetPost($id);
        return view("Admin.Post.edit",["postInfo" => $postInfo]);
    }
    public function Update(PostRequest $request,$id){
        self::$postClass->Update($request,\Auth::id(),$id);
        return redirect()->route("editWriterPostPage")->with(["status" => 200,"message" => "پست با موفقیت ویرایش شد"]);
    }
    public function CreatePage(){
        return view("Admin.Post.create");
    }
    public function Create(postRequest $request){
        self::$postClass->Create($request,\Auth::id());
        return redirect()->route("createWriterPostPage")->with(["status" => 200,"message" => "پست با موفقیت ثبت شد"]);
    }
}
