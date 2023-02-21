<?php

use App\Models\Nurse;
use App\Models\User;

beforeEach(function () {
    $this->user = createUser();
});

test('nurse create validation redirect back to form', function () {
    actingAs($this->user)
    ->post(route('admin.nurse.store'), [
        'name' => '',
        'email' => '',
        'password' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name', 'email', 'password'])
    ->assertInvalid(['name', 'email', 'password']);
});

test('nurse create unique validation redirect back to form', function () {
    $user = User::factory()->create(['email' => 'nurse@mail.com']);
    Nurse::factory()->create(['user_id' => $user->id]);

   actingAs($this->user)
    ->post(route('admin.nurse.store'), [
        'email' => 'nurse@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can create a nurse', function () {
    $nurse = ['name' => 'Nurse', 'email' => 'nurse@mail.com', 'password' => 'password'];

   actingAs($this->user)
    ->post(route('admin.nurse.store'), $nurse)
    ->assertStatus(302);

    $this->assertDatabaseHas('users', ['name' => 'Nurse', 'email' => 'nurse@mail.com']);

    $lastNurse = Nurse::latest()->first();
    expect($lastNurse->user->name)->toBe($nurse['name']);
    expect($lastNurse->user->email)->toBe($nurse['email']);
});

test('nurse update validation redirect back to form', function () {
    $nurse = Nurse::factory()->create();

   actingAs($this->user)
    ->put(route('admin.nurse.update', $nurse->id), [
        'name' => '',
        'email' => '',
        'password' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name', 'email'])
    ->assertInvalid(['name', 'email']);
});

test('nurse update unique validation redirect back to form', function () {
    User::factory()->create(['email' => 'nurse@mail.com', 'role' => 'nurse']);
    $nurse = Nurse::factory()->create();

   actingAs($this->user)
    ->put(route('admin.nurse.update', $nurse->id), [
        'name' => 'NUrse',
        'email' => 'nurse@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can update a nurse', function () {
    $nurse = Nurse::factory()->create();

   actingAs($this->user)
    ->put(route('admin.nurse.update', $nurse->id), [
        'name' => 'Nurse',
        'email' => 'nurse@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can delete a nurse', function () {
    $nurse = Nurse::factory()->create();

   actingAs($this->user)
    ->delete(route('admin.nurse.destroy', $nurse->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('nurses', $nurse->toArray());
    $this->assertDatabaseCount('nurses', 0);
});
