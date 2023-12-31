<?php

    namespace App\Tag;

    use Illuminate\Http\Request;
    use App\Models\Tag;

    class TagClass implements TagContract{
        public function GetTags(){
            return Tag::all();
        }
        public function GetTag($id){
            return Tag::where("id",$id)->first();
        }
        public function Create(Request $request){
            $tag=new Tag();
            $tag->name=$request->name;
            $tag->save();
        }
        public function Update(Request $request,$id){
            $tag=$this->GetTag($id);
            $tag->name=$request->name;
            $tag->save();
        }
        public function Delete($id){
            $this->GetTag($id)->delete();
        }
    }
?>
