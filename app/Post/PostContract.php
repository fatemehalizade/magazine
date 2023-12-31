<?php

    namespace App\Post;

    use Illuminate\Http\Request;

    interface PostContract{
        public function GetPosts();
        public function SearchPosts(Request $request,$count=0);
        public function GetPost($id);
        public function GetPostByStatus($id,$status=0);
        public function GetPostByCategoryName($name,$count=0);
        public function GetPostsCategory();
        public function GetUserPost($userId);
        public function GetLatestPost($count=0);
        public function GetSuggestedPost($count=0);
        public function Create(Request $request,$userId);
        public function Update(Request $request,$userId,$id);
        public function DetermineStatus($id,$status);
        public function Delete($id);
    }
?>
