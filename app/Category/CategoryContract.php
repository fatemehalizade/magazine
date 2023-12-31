<?php

    namespace App\Category;

    use Illuminate\Http\Request;

    interface CategoryContract{
        public function GetCategories($categoryId=0,$level=1);
        public function SubCategoriesList($categoryInfo);
        public function CategoryList($categoryId=0);
        public function GetCategory($id);
        public function Create(Request $request);
        public function Update(Request $request,$id);
        public function Delete($id);
    }
?>
