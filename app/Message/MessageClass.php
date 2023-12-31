<?php

    namespace App\Message;

    use App\Models\Message;
    use Illuminate\Http\Request;

    class MessageClass implements MessageContract{
        public function GetMessages(){
            return Message::all();
        }
        public function Create(Request $request){
            $message=new Message();
            $message->name=$request->name;
            $message->email=$request->contactEmail;
            $message->title=$request->title;
            $message->message=$request->message;
            $message->save();
        }
    }
?>
