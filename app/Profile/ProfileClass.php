<?php

    namespace App\Profile;

    use App\Models\Profile;
    use Illuminate\Http\Request;

    class ProfileClass implements ProfileContract{
        public function ProfileInfo(){
            return Profile::first();
        }
        public function Update(Request $request){
            $profile=$this->ProfileInfo();
            $logo=$request->file("logo");
            if($logo){
                if($profile->logo){
                    unlink("storage/upload/profile/".$profile->logo);
                }
                $profile->logo=$logo->storeAs("upload/profile",md5(time()).".".$logo->getClientOriginalExtension(),"public");
            }
            $profile->name=$request->name;
            $profile->mobile_number=$request->mobileNumber;
            $profile->address=$request->address;
            $profile->description=$request->description;
            $profile->updated_at=date("Y-m-d H:i:s");
            $profile->save();
        }
    }
?>
