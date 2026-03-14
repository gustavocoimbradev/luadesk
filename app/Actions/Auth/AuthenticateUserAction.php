<?php 

namespace App\Actions\Auth;

use App\Dto\Auth\AuthenticateUserDto;
use Illuminate\Support\Facades\Auth;

class AuthenticateUserAction {

    public function __invoke(AuthenticateUserDto $credentials): bool {
        return Auth::attempt([
            'email' => $credentials->email,
            'password' => $credentials->password
        ]);
    }

}