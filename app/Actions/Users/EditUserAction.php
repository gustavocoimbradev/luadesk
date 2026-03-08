<?php 

namespace App\Actions\Users;

use App\Models\User;

class EditUserAction {

    public function __invoke(array $data, User $user) {
        if (empty($data['password'])) unset($data['password']);
        if (empty($data['is_admin'])) unset($data['is_admin']);
        $user->update($data);
        return $user;
    }

}