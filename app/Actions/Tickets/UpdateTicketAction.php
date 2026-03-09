<?php 

namespace App\Actions\Tickets;

use App\Dto\Tickets\UpdateTicketDto;
use App\Models\Ticket;

class UpdateTicketAction {

    public function __invoke(Ticket $ticket, UpdateTicketDto $payload): void {
        $ticket->update([
            'title' => $payload->title,
            'content' => $payload->content
        ]);
    }

}