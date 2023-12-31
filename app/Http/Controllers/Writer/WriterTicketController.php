<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;
use App\Ticket\TicketContract;
use Illuminate\Http\Request;
use Auth;

class WriterTicketController extends Controller
{
    private static $ticketClass;
    private $fromUser;
    private $toUser;
    public function __construct(TicketContract $ticketContract){
        self::$ticketClass=$ticketContract;
        $this->fromUser=Auth::id();
        $this->toUser=1;
    }
    public function Index(){
        $tickets=self::$ticketClass->GetTickets($this->fromUser,$this->toUser);
        self::$ticketClass->UpdateTicketStatus($this->fromUser,$this->toUser);
        return view("Writer.Ticket.index",["tickets" => $tickets]);
    }
    public function Create(TicketRequest $ticketRequest){
        self::$ticketClass->Create($ticketRequest,$this->fromUser,$this->toUser);
        return redirect()->route("WriterTicketPage");
    }
}
