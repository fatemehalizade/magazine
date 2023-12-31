<?php

namespace App\Http\Controllers\Writer;

use App\Comment\CommentContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WriterCommentController extends Controller
{
    private static $commentClass;
    public function __construct(CommentContract $commentContract){
        self::$commentClass=$commentContract;
    }
    public function Index(){
        $user=\Auth::user();
        $posts=$user->Post;
        $comments=self::$commentClass->CommentsList($posts);
        return view("Admin.Comment.index",["comments" => $comments]);
    }
}
