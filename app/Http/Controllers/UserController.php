<?php

namespace App\Http\Controllers;

use App\Actions\Users\{CreateUserAction, DeleteUserAction, EditUserAction};
use App\Models\User;
use App\Http\Requests\{StoreUserRequest, UpdateUserRequest};
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class UserController extends Controller
{

    public function index() {
        Gate::authorize('viewAny', User::class);
        $users = User::latestFirst()->get();
        return Inertia::render('Users/Index', compact('users'));
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

    public function store(StoreUserRequest $request, CreateUserAction $action) {
        Gate::authorize('create', User::class);
        $action($request->validated());
        return to_route('users.index');
    }

    public function update(UpdateUserRequest $request, User $user, EditUserAction $action) {
        Gate::authorize('update', $user);
        $user = $action($request->validated(), $user);
        if (auth()->user()->is_admin) {
            return to_route('users.index')
                ->with('success', 'User updated successfully!');
        }
        return to_route('users.edit', $user)
            ->with('success', 'Account updated successfully!');
    }

    public function destroy(User $user, DeleteUserAction $action) {
        Gate::authorize('delete', $user);
        $action($user);
        return to_route('users.index');
    }

}
