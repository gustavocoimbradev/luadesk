<?php 

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Auth;

class AuthenticateUserAction {

    public function __invoke(array $credentials): bool {
        return Auth::attempt($credentials);
    }

}