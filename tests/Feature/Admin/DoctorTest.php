<?php

use App\Models\Doctor;

beforeEach(function(){
    $this->user = createUser();
});

test('doctor create validation redirect back to form', function(){
    $this->actingAs($this->user)
    ->post(routeToUrl('admin.department.store'), [
        'name' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name'])
    ->assertInvalid(['name']);
});

test('doctor create unique validation redirect back to form', function(){
    Doctor::factory()->create(['name' => 'Department']);

    $this->actingAs($this->user)
    ->post(routeToUrl('admin.department.store'), [
        'name' => 'Department',
    ])
    ->assertStatus(302);
});

it('admin can create a doctor', function () {
    $doctor  = ['name' => 'Test Doctor', 'description' => 'any description'];

    $this->actingAs($this->user)
    ->post(routeToUrl('admin.department.store'), $doctor)
    ->assertStatus(201);

    $this->assertDatabaseHas('departments', $doctor);

    $lastProduct = Doctor::latest()->first();
    expect($lastProduct->name)->toBe($doctor['name']);
    expect($lastProduct->description)->toBe($doctor['description']);
});

test('doctor  update validation redirect back to form', function(){
    $doctor  = Doctor::factory()->create();

    $this->actingAs($this->user)
    ->put("/admin/department/".$doctor->id, [
        'name' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name'])
    ->assertInvalid(['name']);
});

test('doctor  update unique validation redirect back to form', function(){
    $doctor  = Doctor::factory()->create(['name' => 'Department']);
    Doctor::factory()->create(['name' => 'doctor  2']);

    $this->actingAs($this->user)
    ->put("/admin/department/".$doctor->id, [
        'name' => 'doctor  2',
    ])
    ->assertStatus(302);
});

it('admin can update a doctor', function () {
    $data = ['name' => 'Test Doctor', 'description' => 'any description'];
    $doctor  = Doctor::create($data );

    $this->actingAs($this->user)
    ->put("/admin/department/".$doctor->id, [
        'name' => 'New Name',
        'description' => 'New Description',
    ])
    ->assertStatus(302);
});

it('admin can delete a doctor', function () {
    $doctor  = Doctor::factory()->create();

    $this->actingAs($this->user)
    ->delete(routeToUrl('admin.department.destroy', $doctor->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('departments', $doctor->toArray());
    $this->assertDatabaseCount('departments',0);
});
