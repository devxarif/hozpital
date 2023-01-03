<?php

use App\Models\Receptionist;
use App\Models\User;

beforeEach(function(){
    $this->user = createUser();
});

test('receptionist create validation redirect back to form', function(){
    actingAs($this->user)
    ->post(route('admin.receptionist.store'), [
        'name' => '',
        'email' => '',
        'password' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name','email','password'])
    ->assertInvalid(['name','email','password']);
});

test('receptionist create unique validation redirect back to form', function(){
    $user = User::factory()->create(['email' => 'receptionist@mail.com']);
    Receptionist::factory()->create(['user_id' => $user->id]);


   actingAs($this->user)
    ->post(route('admin.receptionist.store'), [
        'email' => 'receptionist@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can create a receptionist', function () {
    $receptionist  = ['name' => 'Receptionist', 'email' => 'receptionist@mail.com', 'password' => 'password'];

   actingAs($this->user)
    ->post(route('admin.receptionist.store'), $receptionist)
    ->assertStatus(302);

    $this->assertDatabaseHas('users', ['name' => 'Receptionist', 'email' => 'receptionist@mail.com']);

    $lastreceptionist = Receptionist::latest()->first();
    expect($lastreceptionist->user->name)->toBe($receptionist['name']);
    expect($lastreceptionist->user->email)->toBe($receptionist['email']);
});

test('receptionist update validation redirect back to form', function(){
    $receptionist  = Receptionist::factory()->create();

   actingAs($this->user)
    ->put(route('admin.receptionist.update', $receptionist->id),[
        'name' => '',
        'email' => '',
        'password' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name','email','password'])
    ->assertInvalid(['name','email','password']);
});

test('receptionist update unique validation redirect back to form', function(){
    User::factory()->create(['email' => 'receptionist@mail.com', 'role' => 'receptionist']);
    $receptionist = Receptionist::factory()->create();


   actingAs($this->user)
    ->put(route('admin.receptionist.update', $receptionist->id), [
        'name' => 'Receptionist',
        'email' => 'receptionist@mail.com'
    ])
    ->assertStatus(302);
});

test('admin can update a receptionist', function () {
    $receptionist  = Receptionist::factory()->create();

   actingAs($this->user)
    ->put(route('admin.receptionist.update', $receptionist->id), [
        'name' => 'Receptionist',
        'email' => 'receptionist@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can delete a Receptionist', function () {
    $receptionist  = Receptionist::factory()->create();

   actingAs($this->user)
    ->delete(route('admin.receptionist.destroy', $receptionist->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('receptionists', $receptionist->toArray());
    $this->assertDatabaseCount('receptionists',0);
});
