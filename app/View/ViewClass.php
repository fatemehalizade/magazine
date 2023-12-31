<?php
    namespace App\View;

    use Illuminate\Http\Request;
    use App\Models\View;

    class ViewClass implements ViewContract{
        public function GetViews($count=0){
            return View::orderBy("id","DESC")->paginate($count);
        }
        public function GetMostViews($count=0){
            // SELECT *,COUNT(post_id) as countIds FROM `views` GROUP BY post_id ORDER BY COUNT(post_id) DESC;
            return View::select("*",\DB::raw("COUNT(post_id) as countIds"))->groupBy("post_id")->whereHas(
                "Post", function($query){
                    $query->where("status",1);
                }
            )->orderBy(\DB::raw("COUNT(post_id)"),"DESC")->paginate($count);
        }
        public function UserIP(){
            $IPaddress="";
            if (isset($_SERVER['HTTP_CLIENT_IP']))
                $IPaddress=$_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $IPaddress=$_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $IPaddress=$_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
                $IPaddress=$_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $IPaddress=$_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
                $IPaddress=$_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
                $IPaddress=$_SERVER['REMOTE_ADDR'];
            else
                $IPaddress='UNKNOWN';
            return $IPaddress;
        }
        public function Create($postId,$userId=null){
            $view=new View();
            $view->ip=$this->UserIP();
            $view->user_id=$userId;
            $view->post_id=$postId;
            $view->save();
        }
    }
?>
