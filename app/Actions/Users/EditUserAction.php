<?php 

namespace App\Actions\Users;

use App\Dto\Users\UpdateUserDto;
use App\Models\User;

class EditUserAction {

    public function __invoke(UpdateUserDto $data, User $user) {

        $attributes = [
            'name' => $data->name,
            'email' => $data->email
        ];

        if (!empty($data->password)) {
            $attributes['password'] = $data->password;
        }

        if (auth()->user()->is_admin) {
            $attributes['is_admin'] = $data->is_admin;
        }

        $user->update($attributes);
        
        return $user;
    }

}