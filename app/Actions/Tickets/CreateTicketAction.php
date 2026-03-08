<?php 

namespace App\Actions\Tickets;

class CreateTicketAction {

    public function __invoke(array $payload) {
        return auth()->user()->tickets()->create($payload);
    }

}