<?php

    namespace App\Ticket;

    use Illuminate\Http\Request;

    interface TicketContract{
        public function GetTickets($fromUser,$toUser);
        public function Create(Request $request,$fromUser,$toUser);
        public function UpdateTicketStatus($fromUser,$toUser);
        public function UsersList($id);
    }
?>
