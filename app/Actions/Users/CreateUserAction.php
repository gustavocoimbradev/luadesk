<?php 

namespace App\Actions\Users;

use App\Dto\Users\CreateUserDto;
use App\Models\User;

class CreateUserAction {

    public function __invoke(CreateUserDto $data): User {
        return User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password
        ]);
    }

}