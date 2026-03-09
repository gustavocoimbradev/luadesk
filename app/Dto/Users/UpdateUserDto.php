<?php 

namespace App\Dto\Users;

use App\Http\Requests\UpdateUserRequest;

class UpdateUserDto {

    public function __construct(
        public string $name,
        public string $email,
        public ?string $password,
        public ?bool $is_admin
    ) {}

    public static function fromRequest(UpdateUserRequest $request): self {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            password: $request->validated('password'),
            is_admin: $request->boolean('is_admin')
        );
    }

}