<?php

use App\Models\Department;
use App\Models\Manufacture;
use App\Models\MedicineCategory;

beforeEach(function(){
    $this->user = createUser();
});

test('medicine categoty create validation redirect back to form', function(){
    actingAs($this->user)
    ->post(route('admin.medicineCategory.store'), [
        'name' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name'])
    ->assertInvalid(['name']);
});

test('medicine category create unique validation redirect back to form', function(){
    MedicineCategory::factory()->create(['name' => 'Fever']);

   actingAs($this->user)
    ->post(route('admin.medicineCategory.store'), [
        'name' => 'Fever',
    ])
    ->assertStatus(302);
});

test('admin can create a medicine category', function () {
    $medicine_categoty = ['name' => 'Acme', 'description' => 'any description'];

    actingAs($this->user)
    ->post(route('admin.medicineCategory.store'), $medicine_categoty)
    ->assertStatus(302);

    $this->assertDatabaseHas('medicine_categories', $medicine_categoty);

    $lastItem = MedicineCategory::latest()->first();
    expect($lastItem->name)->toBe($medicine_categoty['name']);
});

test('medicine categoty update validation redirect back to form', function(){
    $medicine_categoty = MedicineCategory::factory()->create();

    actingAs($this->user)
    ->put(route('admin.medicineCategory.update', $medicine_categoty->id), [
        'name' => '',
        'description' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name'])
    ->assertInvalid(['name']);
});

test('medicine cateogry update unique validation redirect back to form', function(){
    MedicineCategory::factory()->create(['name' => 'Fever']);
    $medicine_categoty  = MedicineCategory::factory()->create();

   actingAs($this->user)
    ->put(route('admin.medicineCategory.update', $medicine_categoty->id),[
        'name' => 'Fever',
        'description' => 'any description',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name'])
    ->assertInvalid(['name']);
});

test('admin can update a manufacture', function () {
    $medicine_categoty = MedicineCategory::create([
        'name' => 'Fever',
        'description' => 'any descripiton',
    ]);

    actingAs($this->user)
    ->put(route('admin.medicineCategory.update', $medicine_categoty->id), [
        'name' => 'Popular',
    ])
    ->assertStatus(302);
});

test('admin can delete a manufacture', function () {
    $medicine_categoty = MedicineCategory::factory()->create();

    actingAs($this->user)
    ->delete(route('admin.medicineCategory.destroy', $medicine_categoty->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('medicine_categories', $medicine_categoty->toArray());
    $this->assertDatabaseCount('medicine_categories',0);
});
