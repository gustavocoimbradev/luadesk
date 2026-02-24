<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use App\Http\Requests\{StoreUserRequest, UpdateUserRequest};
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class UserController extends Controller
{

    public function __construct(protected UserService $service) {}
    
    public function index() {
        Gate::authorize('viewAny', User::class);
        return Inertia::render('Users/Index', [
            'users' => $this->service->getAllUsers()
        ]);
    }

    public function create() {
        Gate::authorize('create', User::class);
        return Inertia::render('Users/Create');
    }

    public function edit(User $user) {
        Gate::authorize('update', $user);
        return Inertia::render('Users/Edit', [
            'user' => $user
        ]);
    }

    public function store(StoreUserRequest $request) {
        Gate::authorize('create', User::class);
        $this->service->createUser($request->validated());
        return to_route('users.index');
    }

    public function update(UpdateUserRequest $request, User $user) {
        Gate::authorize('update', $user);
        $user = $this->service->editUser($request->validated(), $user);
        if (auth()->user()->is_admin) {
            return to_route('users.index')
                ->with('success', 'User updated successfully!');
        }
        return to_route('users.edit', $user)
            ->with('success', 'Account updated successfully!');
    }

}
