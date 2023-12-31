<?php

    namespace App\Post;

    use App\Models\Post;
    use Illuminate\Http\Request;

    class PostClass implements PostContract{
        public function GetPosts(){
            return Post::orderBy("id","DESC")->get();
        }
        public function SearchPosts(Request $request,$count=0){
            return Post::where("subject","like","%{$request->text}%")->orWhereHas(
                "Category", function($query) use ($request){
                $query->where("name","like","%{$request->text}%");
            })->orderBy("id","DESC")->paginate($count);
        }
        public function GetPost($id){
            return Post::where("id",$id)->first();
        }
        public function GetPostByStatus($id,$status=0){
            return Post::where("id",$id)->where("status",$status)->first();
        }
        public function GetPostByCategoryName($name,$count=0){
            return Post::where("status",1)->whereHas(
                "Category", function($query) use ($name){
                    $query->where("name",$name);
                }
            )->orderBy("id","DESC")->paginate($count);
        }
        public function GetUserPost($userId){
            return Post::where("user_id",$userId)->orderBy("id","DESC")->get();
        }
        public function GetPostsCategory(){
            return Post::select("category_id")->where("status",1)->orderBy("id","DESC")->distinct()->get();
        }
        public function GetLatestPost($count=0){
            return Post::orderBy("id","DESC")->where("status",1)->paginate($count);
        }
        public function GetSuggestedPost($count=0){
            return Post::where("suggested",1)->where("status",1)->orderBy("id","DESC")->paginate($count);
        }
        public function Create(Request $request,$userId){
            $post=new Post();
            $image=$request->file("image");
            $post->image=$image->storeAs("upload/post",md5(time()).".".$image->getClientOriginalExtension(),"public");
            $post->subject=$request->subject;
            $post->summery=$request->summery;
            $post->time_reading=$request->timeReading;
            $post->category_id=$request->categoryId;
            $post->user_id=$userId;
            $post->description=$request->description;
            $post->save();
        }
        public function Update(Request $request,$userId,$id){
            $post=$this->GetPost($id);
            $image=$request->file("image");
            if($image){
                if($post->image){
                    unlink("storage/".$post->image);
                }
                $post->image=$image->storeAs("upload/post",md5(time()).".".$image->getClientOriginalExtension(),"public");
            }
            $post->subject=$request->subject;
            $post->summery=$request->summery;
            $post->time_reading=$request->timeReading;
            $post->category_id=$request->categoryId;
            $post->user_id=$userId;
            $post->description=$request->description;
            $post->save();
        }
        public function DetermineStatus($id,$status){
            $post=$this->GetPost($id);
            $post->status=$status;
            $post->save();
        }
        public function Delete($id){
            $post=$this->GetPost($id);
            if($post->image){
                unlink("storage/".$post->image);
            }
            $post->delete();
        }
    }
?>
