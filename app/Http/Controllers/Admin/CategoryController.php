<?php

namespace App\Http\Controllers\Admin;

use App\Category\CategoryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private static $categoryClass;
    public function __construct(CategoryContract $categoryContract){
        self::$categoryClass=$categoryContract;
    }
    public function Index(Request $request){
        $categories=self::$categoryClass->CategoryList();
        return view("Admin.Category.index",["categories" => $categories]);
    }
    public function EditPage($id){
        $categoryInfo=self::$categoryClass->GetCategory($id);
        return view("Admin.Category.edit",["categoryInfo" => $categoryInfo]);
    }
    public function Update(CategoryRequest $request,$id){
        self::$categoryClass->Update($request,$id);
        return redirect()->route("editCategoryPage")->with(["status" => 200,"message" => "دسته با موفقیت ویرایش شد"]);
    }
    public function CreatePage(){
        return view("Admin.Category.create");
    }
    public function Create(CategoryRequest $request){
        self::$categoryClass->Create($request);
        return redirect()->route("createCategoryPage")->with(["status" => 200,"message" => "دسته با موفقیت ثبت شد"]);
    }
    public function Delete($id){
        self::$categoryClass->Delete($id);
        return redirect()->route("allCategories")->with(["status" => 200,"message" => "دسته با موفقیت حذف شد"]);
    }
}
