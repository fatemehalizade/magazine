<?php

    namespace App\Profile;

    use Illuminate\Http\Request;

    interface ProfileContract{
        public function ProfileInfo();
        public function Update(Request $request);
    }
?>
