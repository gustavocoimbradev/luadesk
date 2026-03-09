<?php 

namespace App\Dto\Tickets;

use App\Http\Requests\StoreTicketRequest;

readonly class CreateTicketDto {

    public function __construct(
        public string $title,
        public string $content
    ) {}

    public static function fromRequest(StoreTicketRequest $request): self {
        return new self(
            title: $request->validated('title'),
            content: $request->validated('content')
        );
    }

}