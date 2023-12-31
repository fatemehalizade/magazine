<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message\MessageContract;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    private static $messageClass;
    public function __construct(MessageContract $messageContract){
        self::$messageClass=$messageContract;
    }
    public function Index(){
        $messages=self::$messageClass->GetMessages();
        return view("Admin.Message.index",["messages" => $messages]);
    }
}
