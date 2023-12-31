<?php

    namespace App\Category;

    use App\Models\Category;
    use Illuminate\Http\Request;

    class CategoryClass implements CategoryContract{

        private static $categoriesList;
        public function GetCategories($categoryId=0,$level=1){
            return Category::where("category_id",$categoryId)->where("level",$level)->orderBy("id","DESC")->get();
        }
        public function SubCategoriesList($categoryInfo){
            $subCategories=$this->GetCategories($categoryInfo->id,$categoryInfo->level+1);
            if(count($subCategories) != 0){
                foreach ($subCategories as $key => $subCategory) {
                    $categoryIdInfo=$this->GetCategory($subCategory->category_id);
                    $subCategory["category_id_name"]=$categoryIdInfo->name;
                    self::$categoriesList[]=$subCategory;
                    $this->SubCategoriesList($subCategory);
                }
            }
            return [];
        }
        public function CategoryList($categoryId=0){
            $categoryId != 0 ? $firstLevelCategories=[$this->GetCategory($categoryId)] : $firstLevelCategories=$this->GetCategories ();
            if(count($firstLevelCategories) != 0){
                if($firstLevelCategories[0] != null){
                    foreach ($firstLevelCategories as $key => $firstLevelCategory) {
                        self::$categoriesList[]=$firstLevelCategory;
                        $subCategories=$this->SubCategoriesList($firstLevelCategory);
                        if(count($subCategories) != 0){
                            self::$categoriesList[]=$subCategories;
                        }
                    }
                    return self::$categoriesList;
                }
                return [];
            }
            return [];
        }
        public function GetCategory($id){
            return Category::where("id",$id)->first();
        }
        public function Create(Request $request){
            $category=new Category();
            $category->name=$request->name;
            $category->en_name=$request->enName;
            if($request->categoryId != 0){
                $category->category_id=$request->categoryId;
                $category->level=$this->GetCategory($request->categoryId)->level+1;
            }
            $category->save();
        }
        public function Update(Request $request,$id){
            $category=$this->GetCategory($id);
            $category->name=$request->name;
            $category->en_name=$request->enName;
            if($category->category_id != $request->categoryId){
                $category->category_id=$request->categoryId;
                $category->level=$this->GetCategory($request->categoryId)->level+1;
            }
            $category->updated_at=date("Y-m-d H:i:s");
            $category->save();
        }
        public function Delete($id){
            $this->GetCategory($id)->delete();
        }
    }
?>
