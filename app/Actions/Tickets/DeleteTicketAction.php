<?php 

namespace App\Actions\Tickets;

use App\Models\Ticket;

class DeleteTicketAction {

    public function __invoke(Ticket $ticket): void {
        $ticket->delete();
    }

}