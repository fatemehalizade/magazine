<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;
use App\Ticket\TicketContract;
use App\User\UserContract;
use Illuminate\Http\Request;
use Auth;

class TicketController extends Controller
{
    private static $ticketClass,$userClass;
    private $fromUser;

    public function __construct(TicketContract $ticketContract,UserContract $userContract){
        self::$ticketClass=$ticketContract;
        self::$userClass=$userContract;
        $this->fromUser=Auth::id();
    }
    public function Index(){
        $usersList=[];
        $tickets=self::$ticketClass->UsersList($this->fromUser);
        foreach ($tickets as $key => $ticket) {
            $usersList[]=self::$userClass->GetUser($ticket->to_user);
        }
        return view("Admin.Ticket.index",["users" => $usersList]);
    }
    public function Detail($id){
        $tickets=self::$ticketClass->GetTickets($this->fromUser,$id);
        self::$ticketClass->UpdateTicketStatus($this->fromUser,$id);
        return view("Admin.Ticket.detail",["tickets" => $tickets]);
    }
    public function Create(TicketRequest $ticketRequest,$id){
        self::$ticketClass->Create($ticketRequest,$this->fromUser,$id);
        return redirect()->route("detailTicketPage",["id" => $id]);
    }
}
