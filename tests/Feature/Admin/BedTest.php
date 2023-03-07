<?php

use App\Models\Bed;
use App\Models\BedFloor;
use App\Models\BedType;

beforeEach(function () {
    $this->user = createUser();
});

test('bed create validation redirect back to form', function () {
    actingAs($this->user)
    ->post(route('admin.bed.store'), [
        'bed_type_id' => '',
        'bed_floor_id' => '',
        'number' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['bed_type', 'floor', 'number'])
    ->assertInvalid(['bed_type', 'floor', 'number']);
});

test('admin can create a bed', function () {
    $bed_type = BedType::create(['name' => 'ICU']);
    $bed_floor = BedFloor::create(['name' => 'Ground Floor']);

    actingAs($this->user)
    ->post(route('admin.bed.store'), [
        'bed_type_id' => $bed_type->id,
        'bed_floor_id' => $bed_floor->id,
        'number' => rand(1, 999),
    ])
    ->assertStatus(302);
});

test('bed update validation redirect back to form', function () {
    $bed_type = BedType::create(['name' => 'ICU']);
    $bed_floor = BedFloor::create(['name' => 'Ground Floor']);
    $bed = Bed::create([
        'bed_type_id' => $bed_type->id,
        'bed_floor_id' => $bed_floor->id,
        'number' => rand(1, 999),
    ]);

    actingAs($this->user)
    ->put(route('admin.bed.update', $bed->id), [
        'bed_type_id' => '',
        'bed_floor_id' => '',
        'number' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['bed_type', 'floor', 'number'])
    ->assertInvalid(['bed_type', 'floor', 'number']);
});

test('admin can update a bed', function () {
    $bed_type = BedType::create(['name' => 'ICU']);
    $bed_floor = BedFloor::create(['name' => 'Ground Floor']);
    $bed = Bed::create([
        'bed_type_id' => $bed_type->id,
        'bed_floor_id' => $bed_floor->id,
        'number' => rand(1, 999),
    ]);

    actingAs($this->user)
    ->put(route('admin.bed.update', $bed->id), [
        'bed_type_id' => $bed_type->id,
        'bed_floor_id' => $bed_floor->id,
        'number' => rand(1, 999),
    ])
    ->assertStatus(302);
});

test('admin can delete a bed', function () {
    BedType::create(['name' => 'ICU']);
    BedFloor::create(['name' => 'Ground Floor']);
    $bed = Bed::factory()->create();

    actingAs($this->user)
    ->delete(route('admin.bed.destroy', $bed->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('departments', $bed->toArray());
    $this->assertDatabaseCount('departments', 0);
});
