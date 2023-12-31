<?php

    namespace App\Comment;

    use App\Models\Comment;
    use Illuminate\Http\Request;
    use Auth;

    class CommentClass implements CommentContract{
        private static $List;
        public function GetComments($commentId=0,$postId){
            return Comment::where("comment_id",$commentId)->where("post_id",$postId)->orderBy("id","DESC")->get();
        }
        public function GetActiveComments($commentId=0,$postId){
            return Comment::where("comment_id",$commentId)->where("post_id",$postId)->where("status",1)->orderBy("id","DESC")->get();
        }
        public function GetComment($id){
            return Comment::findOrFail($id);
        }
        public function SubCommentsList($commentInfo,$postId=0){
            $subComments=$this->GetComments($commentInfo->id,$postId);
            if(count($subComments) != 0){
                foreach ($subComments as $key => $subComment) {
                    // $commentIdInfo=$this->GetComment($subComment->id);
                    $subComment["comment_id_comment"]=$commentInfo->comment;
                    self::$List[]=$subComment;
                    $this->SubCommentsList($subComment,$postId);
                }
            }
            return [];
        }
        public function CommentsList($posts=null,$postId=0){
            $posts != 0 ? $firstLevelComments=$posts : $firstLevelComments=$this->GetComments(0,$postId);
            if(count($firstLevelComments) != 0){
                foreach ($firstLevelComments as $key => $firstLevelComment) {
                    self::$List[]=$firstLevelComment;
                    $subComments=$this->SubCommentsList($firstLevelComment,$postId);
                    if(count($subComments) != 0){
                        self::$List[]=$subComments;
                    }
                }
                return self::$List;
            }
            return [];
        }
        public function ActiveCommentsList($postId=0){
            $firstLevelComments=$this->GetActiveComments(0,$postId);
            if(count($firstLevelComments) != 0){
                foreach ($firstLevelComments as $key => $firstLevelComment) {
                    self::$List[]=$firstLevelComment;
                    $subComments=$this->SubCommentsList($firstLevelComment,$postId);
                    if(count($subComments) != 0){
                        self::$List[]=$subComments;
                    }
                }
                return self::$List;
            }
            return [];
        }
        public function DetermineStatus($id,$status){
            $comment=$this->GetComment($id);
            $comment->status=$status;
            $comment->save();
        }
        public function Create(Request $requset){
            $comment=new Comment();
            $fullName="";
            $email="";
            Auth::check() ? $fullName=Auth::user()->first_name." ".Auth::user()->last_name : $fullName=$requset->fullName;
            $comment->full_name=$fullName;
            Auth::check() ? $email=Auth::user()->email : $email=$requset->commentEmail;
            $comment->email=$email;
            $comment->comment=$requset->comment;
            $comment->post_id=$requset->postId;
            $comment->comment_id=$requset->commentId;
            $comment->save();
        }
    }
?>
