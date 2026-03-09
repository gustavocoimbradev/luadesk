<?php 

namespace App\Actions\Answers;

use App\Dto\Answers\CreateAnswerDto;
use App\Models\Ticket;

class CreateAnswerAction {

    public function __invoke(CreateAnswerDto $payload, Ticket $ticket) {
        if (($ticket->status === 2 && !auth()->user()->is_admin) || ($payload->closes_ticket && !auth()->user()->is_admin)) abort(403);
        return $ticket->answers()->create([
            'ticket_id' => $ticket->id,
            'user_id' => auth()->id(),
            'content' => $payload->content,
            'closes_ticket' => $payload->closes_ticket
        ]);
    } 

}