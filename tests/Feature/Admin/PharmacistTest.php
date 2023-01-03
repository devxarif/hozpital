<?php

use App\Models\User;
use App\Models\Pharmacist;

beforeEach(function(){
    $this->user = createUser();
});

test('pharmacist create validation redirect back to form', function(){
    actingAs($this->user)
    ->post(route('admin.pharmacist.store'), [
        'name' => '',
        'email' => '',
        'password' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name','email','password'])
    ->assertInvalid(['name','email','password']);
});

test('pharmacist create unique validation redirect back to form', function(){
    $user = User::factory()->create(['email' => 'pharmacist@mail.com']);
    Pharmacist::factory()->create(['user_id' => $user->id]);


   actingAs($this->user)
    ->post(route('admin.pharmacist.store'), [
        'email' => 'pharmacist@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can create a pharmacist', function () {
    $pharmacist  = ['name' => 'Pharmacist', 'email' => 'pharmacist@mail.com', 'password' => 'password'];

   actingAs($this->user)
    ->post(route('admin.pharmacist.store'), $pharmacist)
    ->assertStatus(302);

    $this->assertDatabaseHas('users', ['name' => 'Pharmacist', 'email' => 'pharmacist@mail.com']);

    $lastpharmacist = Pharmacist::latest()->first();
    expect($lastpharmacist->user->name)->toBe($pharmacist['name']);
    expect($lastpharmacist->user->email)->toBe($pharmacist['email']);
});

test('pharmacist update validation redirect back to form', function(){
    $pharmacist  = Pharmacist::factory()->create();

   actingAs($this->user)
    ->put(route('admin.pharmacist.update', $pharmacist->id),[
        'name' => '',
        'email' => '',
        'password' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name','email','password'])
    ->assertInvalid(['name','email','password']);
});

test('pharmacist update unique validation redirect back to form', function(){
    User::factory()->create(['email' => 'pharmacist@mail.com', 'role' => 'pharmacist']);
    $pharmacist = Pharmacist::factory()->create();


   actingAs($this->user)
    ->put(route('admin.pharmacist.update', $pharmacist->id), [
        'name' => 'pharmacist',
        'email' => 'pharmacist@mail.com'
    ])
    ->assertStatus(302);
});

test('admin can update a pharmacist', function () {
    $pharmacist  = Pharmacist::factory()->create();

   actingAs($this->user)
    ->put(route('admin.pharmacist.update', $pharmacist->id), [
        'name' => 'Pharmacist',
        'email' => 'pharmacist@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can delete a nurse', function () {
    $pharmacist  = Pharmacist::factory()->create();

   actingAs($this->user)
    ->delete(route('admin.pharmacist.destroy', $pharmacist->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('pharmacists', $pharmacist->toArray());
    $this->assertDatabaseCount('pharmacists',0);
});
