<?php

use App\Models\Department;

beforeEach(function(){
    $this->user = createUser();
});

test('department create validation redirect back to form', function(){
    $this->actingAs($this->user)
    ->post(routeToUrl('admin.department.store'), [
        'name' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name'])
    ->assertInvalid(['name']);
});

test('department create unique validation redirect back to form', function(){
    Department::factory()->create(['name' => 'Department']);

    $this->actingAs($this->user)
    ->post(routeToUrl('admin.department.store'), [
        'name' => 'Department',
    ])
    ->assertStatus(302);
});

it('admin can create a department', function () {
    $department = ['name' => 'Test Department', 'description' => 'any description'];

    $this->actingAs($this->user)
    ->post(routeToUrl('admin.department.store'), $department)
    ->assertStatus(302);

    $this->assertDatabaseHas('departments', $department);

    $lastProduct = Department::latest()->first();
    expect($lastProduct->name)->toBe($department['name']);
    expect($lastProduct->description)->toBe($department['description']);
});

test('department update validation redirect back to form', function(){
    $department = Department::factory()->create();

    $this->actingAs($this->user)
    ->put("/admin/department/".$department->id, [
        'name' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name'])
    ->assertInvalid(['name']);
});

test('department update unique validation redirect back to form', function(){
    $department = Department::factory()->create(['name' => 'Department']);
    Department::factory()->create(['name' => 'Department 2']);

    $this->actingAs($this->user)
    ->put("/admin/department/".$department->id, [
        'name' => 'Department 2',
    ])
    ->assertStatus(302);
});

it('admin can update a department', function () {
    $data = ['name' => 'Test Department', 'description' => 'any description'];
    $department = Department::create($data );

    $this->actingAs($this->user)
    ->put("/admin/department/".$department->id, [
        'name' => 'New Name',
        'description' => 'New Description',
    ])
    ->assertStatus(302);
});

it('admin can delete a department', function () {
    $department = Department::factory()->create();

    $this->actingAs($this->user)
    ->delete(routeToUrl('admin.department.destroy', $department->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('departments', $department->toArray());
    $this->assertDatabaseCount('departments',0);
});
