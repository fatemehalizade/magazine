<?php

    namespace App\Message;

    use Illuminate\Http\Request;

    interface MessageContract{
        public function GetMessages();
        public function Create(Request $request);
    }
?>
