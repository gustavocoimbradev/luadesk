<?php 

namespace App\Dto\Answers;

use App\Http\Requests\StoreAnswerRequest;

readonly class CreateAnswerDto {

    public function __construct(
        public string $content,
        public bool $closes_ticket
    ) {}

    public static function fromRequest(StoreAnswerRequest $request): self {
        return new self(
            content: $request->validated('content'),
            closes_ticket: $request->validated('closes_ticket', false)
        );
    }

}