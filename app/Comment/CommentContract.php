<?php

    namespace App\Comment;

    use Illuminate\Http\Request;

    interface CommentContract{
        public function GetComments($commentId=0,$postId);
        public function GetActiveComments($commentId=0,$postId);
        public function GetComment($id);
        public function SubCommentsList($commentInfo,$postId=0);
        public function CommentsList($posts=null,$postId=0);
        public function ActiveCommentsList($postId=0);
        public function DetermineStatus($id,$status);
        public function Create(Request $requset);
    }
?>
