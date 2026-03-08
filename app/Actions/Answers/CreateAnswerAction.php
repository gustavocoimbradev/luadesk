<?php 

namespace App\Actions\Answers;

use App\Models\Ticket;

class CreateAnswerAction {

    public function __invoke(array $payload, Ticket $ticket) {
        if (($ticket->status === 2 && !auth()->user()->is_admin) || ($payload['closes_ticket'] && !auth()->user()->is_admin)) abort(403);
        $payload['ticket_id'] = $ticket->id;
        $payload['user_id'] = auth()->id();
        return $ticket->answers()->create($payload);
    } 

}