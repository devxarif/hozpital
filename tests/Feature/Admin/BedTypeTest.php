<?php

use App\Models\BedType;

beforeEach(function(){
    $this->user = createUser();
});

test('bed type create validation redirect back to form', function(){
    actingAs($this->user)
    ->post(route('admin.bedType.store'), [
        'name' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name'])
    ->assertInvalid(['name']);
});

test('bed type create unique validation redirect back to form', function(){
    BedType::create(['name' => 'ICU']);

    actingAs($this->user)
    ->post(route('admin.bedType.store'), [
        'name' => 'ICU',
    ])
    ->assertStatus(302);
});

test('admin can create a bed type', function () {
    $bed_type = ['name' => 'ICU', 'description' => 'any description'];

    actingAs($this->user)
    ->post(route('admin.bedType.store'), $bed_type)
    ->assertStatus(302);

    $this->assertDatabaseHas('bed_types', $bed_type);

    $lastProduct = BedType::latest()->first();
    expect($lastProduct->name)->toBe($bed_type['name']);
    expect($lastProduct->description)->toBe($bed_type['description']);
});

test('bed type update validation redirect back to form', function(){
    $bed_type = BedType::create(['name' => 'Male Ward']);

    actingAs($this->user)
    ->put(route('admin.bedType.update', $bed_type->id), [
        'name' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name'])
    ->assertInvalid(['name']);
});

test('bed type update unique validation redirect back to form', function(){
    $bed_type = BedType::create(['name' => 'Female Ward']);
    BedType::create(['name' => 'Male Ward']);

    actingAs($this->user)
    ->put(route('admin.bedType.update', $bed_type->id), [
        'name' => 'Female Ward',
    ])
    ->assertStatus(302);
});

test('admin can update a bed type', function () {
    $data = ['name' => 'ICU', 'description' => 'any description'];
    $bed_type = BedType::create($data );

    actingAs($this->user)
    ->put(route('admin.bedType.update', $bed_type->id), [
        'name' => 'Male Ward',
        'description' => 'New Description',
    ])
    ->assertStatus(302);
});

test('admin can delete a bed type', function () {
    $data = ['name' => 'ICU', 'description' => 'any description'];
    $bed_type = BedType::create($data );

    actingAs($this->user)
    ->delete(route('admin.bedType.destroy', $bed_type->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('bed_types', $bed_type->toArray());
    $this->assertDatabaseCount('bed_types',0);
});

