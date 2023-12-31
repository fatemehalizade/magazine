<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\View\ViewContract;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    private static $viewClass;
    public function __construct(ViewContract $viewContract){
        self::$viewClass=$viewContract;
    }
    public function Index(){
        $views=self::$viewClass->GetViews();
        return view("Admin.View.index",["views" => $views]);
    }
}
