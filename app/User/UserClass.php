<?php

    namespace App\User;

    use App\Models\User;
    use Auth;
    use Illuminate\Http\Request;

    class UserClass implements UserContract{
        public function Create(Request $request){
            $user=new User();
            $user->first_name=$request->firstName;
            $user->last_name=$request->lastName;
            $user->email=$request->email;
            $user->mobile_number=$request->mobileNumber;
            $user->username=$request->username;
            $user->password=\Hash::make($request->password);
            $user->save();
            $user->Role()->attach(2);
        }
        public function CheckUser(Request $request){
            return Auth::attempt(["username" => $request->loginUsername,"password" => $request->loginPassword]);
        }
        public function GetUser($id){
            return User::where("id",$id)->first();
        }
        public function GetUsers(){
            return User::where("id","!=",1)->orderBy("id","DESC")->get();
        }
        public function Update(Request $request,$id){
            $user=$this->GetUser($id);
            $image=$request->file("image");
            if($image){
                if($user->image){
                    unlink("storage/upload/user/".$user->image);
                }
                $user->image=$image->storeAs("upload/user",md5(time()).".".$image->getClientOriginalExtension(),"public");
            }
            $user->first_name=$request->firstName;
            $user->last_name=$request->lastName;
            $user->email=$request->email;
            $user->mobile_number=$request->mobileNumber;
            $user->username=$request->username;
            if($request->password){
                $user->password=\Hash::make($request->password);
            }
            if($request->description){
                $user->description=$request->description;
            }
            $user->save();
        }
        public function Delete($id){
            $user=$this->GetUser($id);
            if($user->image){
                unlink("storage/".$user->image);
            }
            $user->delete();
        }
    }
?>
