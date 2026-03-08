<?php

namespace App\Http\Controllers;

use App\Actions\Auth\AuthenticateUserAction;
use App\Http\Requests\{StoreAuthRequest};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{ 

    public function create() {
        return Inertia::render('Auth/Create');
    }

    public function store(StoreAuthRequest $request, AuthenticateUserAction $action) {
        if ($action($request->validated())) {
            $request->session()->regenerate();
            return redirect()->intended(route('tickets.index'));
        } 
        return back()->withErrors([
            'message' => 'Invalid credentials'
        ]);
    }

    public function destroy(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('auth.create');
    }
    
}
