<?php

use App\Models\BedFloor;

beforeEach(function(){
    $this->user = createUser();
});

test('bed floor create validation redirect back to form', function(){
    actingAs($this->user)
    ->post(route('admin.bedFloor.store'), [
        'name' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name'])
    ->assertInvalid(['name']);
});

test('bed floor create unique validation redirect back to form', function(){
    BedFloor::create(['name' => 'Ground Floor']);

    actingAs($this->user)
    ->post(route('admin.bedFloor.store'), [
        'name' => 'Ground Floor',
    ])
    ->assertStatus(302);
});

test('admin can create a bed floor', function () {
    $bed_floor = ['name' => 'Ground Floor', 'description' => 'any description'];

    actingAs($this->user)
    ->post(route('admin.bedFloor.store'), $bed_floor)
    ->assertStatus(302);

    $this->assertDatabaseHas('bed_floors', $bed_floor);

    $lastProduct = BedFloor::latest()->first();
    expect($lastProduct->name)->toBe($bed_floor['name']);
    expect($lastProduct->description)->toBe($bed_floor['description']);
});

test('bed floor update validation redirect back to form', function(){
    $bed_floor = BedFloor::create(['name' => '1st Floor']);

    actingAs($this->user)
    ->put(route('admin.bedFloor.update', $bed_floor->id), [
        'name' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name'])
    ->assertInvalid(['name']);
});

test('bed floor update unique validation redirect back to form', function(){
    $bed_floor = BedFloor::create(['name' => '2nd Floor']);
    BedFloor::create(['name' => '1st Floor']);

    actingAs($this->user)
    ->put(route('admin.bedFloor.update', $bed_floor->id), [
        'name' => '2nd Floor',
    ])
    ->assertStatus(302);
});

test('admin can update a bed floor', function () {
    $data = ['name' => 'Ground Floor', 'description' => 'any description'];
    $bed_floor = BedFloor::create($data );

    actingAs($this->user)
    ->put(route('admin.bedFloor.update', $bed_floor->id), [
        'name' => '1st Floor',
        'description' => 'New Description',
    ])
    ->assertStatus(302);
});

test('admin can delete a bed floor', function () {
    $data = ['name' => 'Ground Floor', 'description' => 'any description'];
    $bed_floor = BedFloor::create($data );

    actingAs($this->user)
    ->delete(route('admin.bedFloor.destroy', $bed_floor->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('bed_floors', $bed_floor->toArray());
    $this->assertDatabaseCount('bed_floors',0);
});


