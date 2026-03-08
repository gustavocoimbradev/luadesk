<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('user list page can be rendered', function() {
    $admin = User::factory()->create(['is_admin' => true]);
    $this->actingAs($admin)
        ->get(route('users.index'))
        ->assertStatus(200);
});

test('user creating form page can be rendered', function() {
    $admin = User::factory()->create(['is_admin' => true]);
    $this->actingAs($admin)->get(route('users.create'))->assertStatus(200);
});

test('user can be created', function() {

    $admin = User::factory()->create(['is_admin' => true]);
    
    $data = [
        'name' => fake()->name(),
        'email' => fake()->unique()->safeEmail(),
        'password' => fake()->password()
    ];

    $this->actingAs($admin)
        ->followingRedirects()
        ->post(route('users.store', $data))
        ->assertStatus(200)
        ->assertSee($data['name']);

    $this->assertDatabaseHas('users', ['email' => $data['email']]);

});

test('user editing form page can be rendered', function(){
    $admin = User::factory()->create(['is_admin' => true]);
    $user = User::factory()->create();
    $this->actingAs($admin)
        ->get(route('users.edit', $user))
        ->assertSee($user->name)
        ->assertStatus(200);
});

test('user can be edited', function() {

    $admin = User::factory()->create(['is_admin' => true]);
    $user = User::factory()->create(['name' => 'Old Name']);

    $payload = [
        'name'      => 'New Name',
        'email'     => fake()->unique()->safeEmail(),
        'password'  => ''
    ];

    $this->actingAs($admin)
        ->followingRedirects()
        ->put(route('users.update', $user), $payload)
        ->assertStatus(200)
        ->assertSee('New Name');

    $this->assertDatabaseHas('users', [
        'id'    => $user->id,
        'name'  => $payload['name']
    ]);

});
