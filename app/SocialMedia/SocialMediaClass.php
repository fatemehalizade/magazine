<?php

    namespace App\SocialMedia;

    use App\Models\SocialMedia;
    use Illuminate\Http\Request;

    class SocialMediaClass implements SocialMediaContract{
        public function GetSocialMedias(){
            return SocialMedia::all();
        }
        public function GetSocialMedia($id){
            return SocialMedia::where("id",$id)->first();
        }
        public function Create(Request $request){
            $SocialMedia=new SocialMedia();
            $SocialMedia->name=$request->name;
            $SocialMedia->en_name=$request->enName;
            $SocialMedia->url=$request->url;
            $SocialMedia->save();
        }
        public function Update(Request $request,$id){
            $SocialMedia=$this->GetSocialMedia($id);
            $SocialMedia->name=$request->name;
            $SocialMedia->en_name=$request->enName;
            $SocialMedia->url=$request->url;
            $SocialMedia->save();
        }
        public function Delete($id){
            $this->GetSocialMedia($id)->delete();
        }
    }
?>
