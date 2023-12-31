<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Tag\TagContract;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private static $tagClass;
    public function __construct(TagContract $tagContract){
        self::$tagClass=$tagContract;
    }
    public function Index(Request $request){
        $tags=self::$tagClass->GetTags();
        return view("Admin.Tag.index",["tags" => $tags]);
    }
    public function EditPage($id){
        $tagInfo=self::$tagClass->GetTag($id);
        return view("Admin.Tag.edit",["tagInfo" => $tagInfo]);
    }
    public function Update(TagRequest $request,$id){
        self::$tagClass->Update($request,$id);
        return redirect()->route("editTagPage")->with(["status" => 200,"message" => "برچسب با موفقیت ویرایش شد"]);
    }
    public function CreatePage(){
        return view("Admin.Tag.create");
    }
    public function Create(TagRequest $request){
        self::$tagClass->Create($request);
        return redirect()->route("createTagPage")->with(["status" => 200,"message" => "برچسب با موفقیت ثبت شد"]);
    }
    public function Delete($id){
        self::$tagClass->Delete($id);
        return redirect()->route("allTags")->with(["status" => 200,"message" => "برچسب با موفقیت حذف شد"]);
    }
}
