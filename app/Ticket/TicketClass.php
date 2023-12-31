<?php

    namespace App\Ticket;

    use Illuminate\Http\Request;
    use App\Models\Ticket;

    class TicketClass implements TicketContract{
        public function GetTickets($fromUser,$toUser){
            return Ticket::where(function($query) use ($fromUser,$toUser){
                $query->where("from_user",$fromUser)->where("to_user",$toUser);
            })->orWhere(function($query) use ($fromUser,$toUser){
                $query->where("from_user",$toUser)->where("to_user",$fromUser);
            })->get();
        }
        public function Create(Request $request,$fromUser,$toUser){
            $ticket=new Ticket();
            $ticket->from_user=$fromUser;
            $ticket->to_user=$toUser;
            $ticket->message=$request->message;
            $ticket->save();
        }
        public function UpdateTicketStatus($fromUser,$toUser){
            Ticket::where("status",0)->where("from_user",$toUser)->where("to_user",$fromUser)->update(["status"=>1]);
        }
        public function UsersList($id){
            return Ticket::where("from_user",$id)->distinct("to_user")->orderBy("id","DESC")->get();
        }
    }
?>
