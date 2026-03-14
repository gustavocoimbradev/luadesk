<?php 

namespace App\Actions\Tickets;

use App\Dto\Tickets\CreateTicketDto;

class CreateTicketAction {

    public function __invoke(CreateTicketDto $payload) {
        return auth()->user()->tickets()->create([
            'title' => $payload->title,
            'content' => $payload->content
        ]);
    }

}