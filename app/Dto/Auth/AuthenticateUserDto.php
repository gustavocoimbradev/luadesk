<?php 

namespace App\Dto\Auth;

use App\Http\Requests\StoreAuthRequest;

readonly class AuthenticateUserDto {

    public function __construct(
        public string $email,
        public string $password
    ) {}

    public static function fromRequest(StoreAuthRequest $request): self {
        return new self(
            email: $request->validated('email'),
            password: $request->validated('password')
        );
    }

}