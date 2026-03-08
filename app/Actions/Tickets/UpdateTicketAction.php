<?php 

namespace App\Actions\Tickets;

use App\Models\Ticket;

class UpdateTicketAction {

    public function __invoke(Ticket $ticket, array $payload): void {
        $ticket->update($payload);
    }

}