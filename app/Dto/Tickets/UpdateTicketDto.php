<?php 

namespace App\Dto\Tickets;

use App\Http\Requests\UpdateTicketRequest;

readonly class UpdateTicketDto {

    public function __construct(
        public string $title,
        public string $content
    ) {}

    public static function fromRequest(UpdateTicketRequest $request): self {
        return new self(
            title: $request->validated('title'),
            content: $request->validated('content')
        );
    }

}