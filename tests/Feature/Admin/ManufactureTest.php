<?php

use App\Models\Department;
use App\Models\Manufacture;

beforeEach(function(){
    $this->user = createUser();
});

test('manufacture create validation redirect back to form', function(){
    actingAs($this->user)
    ->post(route('admin.manufacture.store'), [
        'name' => '',
        'email' => '',
        'phone' => '',
        'address' => '',
        'note' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name','email','phone'])
    ->assertInvalid(['name','email','phone']);
});


test('admin can create a department', function () {
    $manufacture = ['name' => 'Acme', 'email' => 'acme@mail.com','phone' => '123456789'];

    actingAs($this->user)
    ->post(route('admin.manufacture.store'), $manufacture)
    ->assertStatus(302);

    $this->assertDatabaseHas('manufactures', $manufacture);

    $lastItem = Manufacture::latest()->first();
    expect($lastItem->name)->toBe($manufacture['name']);
    expect($lastItem->email)->toBe($manufacture['email']);
    expect($lastItem->phone)->toBe($manufacture['phone']);
});

test('manufacture update validation redirect back to form', function(){
    $manufacture = Manufacture::factory()->create();

    actingAs($this->user)
    ->put(route('admin.manufacture.update', $manufacture->id), [
        'name' => '',
        'email' => '',
        'phone' => '',
        'address' => '',
        'note' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name','email','phone'])
    ->assertInvalid(['name','email','phone']);
});

test('admin can update a manufacture', function () {
    $manufacture = Manufacture::create([
        'name' => 'Acme',
        'email' => 'acme@mail.com',
        'phone' => '123456789'
    ]);

    actingAs($this->user)
    ->put(route('admin.manufacture.update', $manufacture->id), [
        'name' => 'Popular',
        'email' => 'popular@mail.com',
        'phone' => '987654321',
        'address' => '',
        'note' => '',
    ])
    ->assertStatus(302);
});

test('admin can delete a manufacture', function () {
    $manufacture = Manufacture::factory()->create();

    actingAs($this->user)
    ->delete(route('admin.manufacture.destroy', $manufacture->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('manufactures', $manufacture->toArray());
    $this->assertDatabaseCount('manufactures',0);
});
