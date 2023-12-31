<?php

    namespace App\Tag;

    use Illuminate\Http\Request;

    interface TagContract{
        public function GetTags();
        public function GetTag($id);
        public function Create(Request $request);
        public function Update(Request $request,$id);
        public function Delete($id);
    }
?>
