<?php 

namespace App\Actions\Users;

use App\Models\User;

class CreateUserAction {

    public function __invoke(array $data): User {
        return User::create($data);
    }

}