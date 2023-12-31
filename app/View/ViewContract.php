<?php
    namespace App\View;

    use Illuminate\Http\Request;

    interface ViewContract{
        public function GetViews($count=0);
        public function GetMostViews($count=0);
        public function UserIP();
        public function Create($postId,$userId=null);
    }
?>
