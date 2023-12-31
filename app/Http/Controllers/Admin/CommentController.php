<?php

namespace App\Http\Controllers\Admin;

use App\Comment\CommentContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private static $commentClass;
    public function __construct(CommentContract $commentContract){
        self::$commentClass=$commentContract;
    }
    public function Index(){
        $comments=self::$commentClass->CommentsList();
        return view("Admin.Comment.index",["comments" => $comments]);
    }
    public function DetermineStatus($id,$status){
        self::$commentClass->DetermineStatus($id,$status);
        return redirect()->route("allComments");
    }
}
