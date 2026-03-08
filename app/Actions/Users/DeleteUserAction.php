<?php 

namespace App\Actions\Users;

use App\Models\User;

class DeleteUserAction {

    public function __invoke(User $user) {
        $user->delete();
    }


}