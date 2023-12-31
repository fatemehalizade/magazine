<?php

namespace App\Http\Controllers;

use App\Comment\CommentContract;
use App\Http\Requests\CommentRequest;
use App\Post\PostContract;
use App\Profile\ProfileContract;
use App\SocialMedia\SocialMediaContract;
use App\View\ViewContract;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class MagazineController extends Controller
{

    private static $websiteProfile,$socialMediasInfo,$profileClass,$socialMediaClass,$postClass,$viewClass,$commentClass;
    public function __construct(ProfileContract $profileContract,SocialMediaContract $socialMediaContract,PostContract $postContract,ViewContract $viewContract,CommentContract $commentContract){
        self::$profileClass=$profileContract;
        self::$socialMediaClass=$socialMediaContract;
        self::$postClass=$postContract;
        self::$viewClass=$viewContract;
        self::$commentClass=$commentContract;
        self::$websiteProfile=self::$profileClass->ProfileInfo();
        self::$socialMediasInfo=self::$socialMediaClass->GetSocialMedias();
    }
    public function Detail($id){
        $userId=null;
        if(Auth::check()){
            $userId=Auth::id();
        }
        self::$viewClass->Create($id,$userId);
        $comments=self::$commentClass->ActiveCommentsList($id);
        return view("detail",[
            "profile" => self::$websiteProfile,
            "socialMedias" => self::$socialMediasInfo,
            "detail" => self::$postClass->GetPostByStatus($id,1),
            "comments" => $comments
        ]);
    }
    private function CommentValidation(Request $request){
        $validation=Validator::make($request->all(),[
            "fullName" => "required|string",
            "commentEmail" => "required|email",
            "comment" => "required|string"
        ]);
        return $validation;
    }
    public function CreateComment(Request $commentRequest,$status){
        $validate=$this->CommentValidation($commentRequest);
        if($validate->fails()){
            return redirect()->back()->with("status",$status)->withErrors($validate)->withInput();
        }
        self::$commentClass->Create($commentRequest);
        return redirect()->back()->with("message","نظرتان با موفقیت ثبت شد");
    }
    public function CategoryPosts($name){
        $categoryPosts=self::$postClass->GetPostByCategoryName($name,4);
        return view("magazines",[
            "profile" => self::$websiteProfile,
            "socialMedias" => self::$socialMediasInfo,
            "categoryPosts" => $categoryPosts
        ]);
    }
    public function LatestPosts(){
        $latestPosts=self::$postClass->GetLatestPost(4);
        return view("magazines",[
            "profile" => self::$websiteProfile,
            "socialMedias" => self::$socialMediasInfo,
            "latestPosts" => $latestPosts
        ]);
    }
    public function SuggestedPosts(){
        $suggestedPosts=self::$postClass->GetSuggestedPost(4);
        return view("magazines",[
            "profile" => self::$websiteProfile,
            "socialMedias" => self::$socialMediasInfo,
            "suggestedPosts" => $suggestedPosts
        ]);
    }
    public function MostVisitedPosts(){
        $mostVisitedPosts=self::$viewClass->GetMostViews(4);
        return view("magazines",[
            "profile" => self::$websiteProfile,
            "socialMedias" => self::$socialMediasInfo,
            "mostVisitedPosts" => $mostVisitedPosts
        ]);
    }
    public function SearchPosts(Request $request){
        $searchedPosts=self::$postClass->SearchPosts($request,5);
        return redirect()->route("MagazinesPage")->with("searchedPosts",$searchedPosts);
    }
}
