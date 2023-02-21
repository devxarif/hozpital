<?php

use App\Models\Laboratorist;
use App\Models\User;

beforeEach(function () {
    $this->user = createUser();
});

test('laboratorist create validation redirect back to form', function () {
    actingAs($this->user)
    ->post(route('admin.laboratorist.store'), [
        'name' => '',
        'email' => '',
        'password' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name', 'email', 'password'])
    ->assertInvalid(['name', 'email', 'password']);
});

test('laboratorist create unique validation redirect back to form', function () {
    $user = User::factory()->create(['email' => 'laboratorist@mail.com']);
    Laboratorist::factory()->create(['user_id' => $user->id]);

   actingAs($this->user)
    ->post(route('admin.laboratorist.store'), [
        'email' => 'laboratorist@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can create a laboratorist', function () {
    $laboratorist = ['name' => 'Laboratorist', 'email' => 'laboratorist@mail.com', 'password' => 'password'];

   actingAs($this->user)
    ->post(route('admin.laboratorist.store'), $laboratorist)
    ->assertStatus(302);

    $this->assertDatabaseHas('users', ['name' => 'Laboratorist', 'email' => 'laboratorist@mail.com']);

    $lastlaboratorist = Laboratorist::latest()->first();
    expect($lastlaboratorist->user->name)->toBe($laboratorist['name']);
    expect($lastlaboratorist->user->email)->toBe($laboratorist['email']);
});

test('laboratorist update validation redirect back to form', function () {
    $laboratorist = Laboratorist::factory()->create();

   actingAs($this->user)
    ->put(route('admin.laboratorist.update', $laboratorist->id), [
        'name' => '',
        'email' => '',
        'password' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name', 'email'])
    ->assertInvalid(['name', 'email']);
});

test('laboratorist update unique validation redirect back to form', function () {
    User::factory()->create(['email' => 'laboratorist@mail.com', 'role' => 'nurse']);
    $laboratorist = Laboratorist::factory()->create();

   actingAs($this->user)
    ->put(route('admin.laboratorist.update', $laboratorist->id), [
        'name' => 'Laboratorist',
        'email' => 'laboratorist@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can update a laboratorist', function () {
    $laboratorist = Laboratorist::factory()->create();

   actingAs($this->user)
    ->put(route('admin.laboratorist.update', $laboratorist->id), [
        'name' => 'Laboratorist',
        'email' => 'laboratorist@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can delete a nurse', function () {
    $laboratorist = Laboratorist::factory()->create();

   actingAs($this->user)
    ->delete(route('admin.laboratorist.destroy', $laboratorist->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('laboratorists', $laboratorist->toArray());
    $this->assertDatabaseCount('laboratorists', 0);
});
