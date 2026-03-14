<?php 

namespace App\Dto\Users;

use App\Http\Requests\StoreUserRequest;

readonly class CreateUserDto {

    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ) {}

    public static function fromRequest(StoreUserRequest $request): self {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            password: $request->validated('password')
        );
    }

}