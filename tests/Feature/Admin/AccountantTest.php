<?php

use App\Models\User;
use App\Models\Accountant;

beforeEach(function(){
    $this->user = createUser();
});

test('accountant create validation redirect back to form', function(){
    actingAs($this->user)
    ->post(route('admin.accountant.store'), [
        'name' => '',
        'email' => '',
        'password' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name','email','password'])
    ->assertInvalid(['name','email','password']);
});

test('accountant create unique validation redirect back to form', function(){
    $user = User::factory()->create(['email' => 'accountant@mail.com']);
    Accountant::factory()->create(['user_id' => $user->id]);


   actingAs($this->user)
    ->post(route('admin.accountant.store'), [
        'email' => 'accountant@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can create a accountant', function () {
    $accountant  = ['name' => 'Accountant', 'email' => 'accountant@mail.com', 'password' => 'password'];

   actingAs($this->user)
    ->post(route('admin.accountant.store'), $accountant)
    ->assertStatus(302);

    $this->assertDatabaseHas('users', ['name' => 'Accountant', 'email' => 'accountant@mail.com']);

    $lastaccountant = Accountant::latest()->first();
    expect($lastaccountant->user->name)->toBe($accountant['name']);
    expect($lastaccountant->user->email)->toBe($accountant['email']);
});

test('accountant update validation redirect back to form', function(){
    $accountant  = Accountant::factory()->create();

   actingAs($this->user)
    ->put(route('admin.accountant.update', $accountant->id),[
        'name' => '',
        'email' => '',
        'password' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name','email'])
    ->assertInvalid(['name','email']);
});

test('accountant update unique validation redirect back to form', function(){
    User::factory()->create(['email' => 'accountant@mail.com', 'role' => 'accountant']);
    $accountant = Accountant::factory()->create();


   actingAs($this->user)
    ->put(route('admin.accountant.update', $accountant->id), [
        'name' => 'Accountant',
        'email' => 'accountant@mail.com'
    ])
    ->assertStatus(302);
});

test('admin can update a accountant', function () {
    $accountant  = Accountant::factory()->create();

   actingAs($this->user)
    ->put(route('admin.accountant.update', $accountant->id), [
        'name' => 'Accountant',
        'email' => 'accountant@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can delete a nurse', function () {
    $accountant  = Accountant::factory()->create();

   actingAs($this->user)
    ->delete(route('admin.accountant.destroy', $accountant->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('accountants', $accountant->toArray());
    $this->assertDatabaseCount('accountants',0);
});
