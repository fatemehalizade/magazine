<?php

    namespace App\User;

    use Illuminate\Http\Request;

    interface UserContract{
        public function GetUsers();
        public function Create(Request $request);
        public function CheckUser(Request $request);
        public function GetUser($id);
        public function Update(Request $request,$id);
    }
?>
