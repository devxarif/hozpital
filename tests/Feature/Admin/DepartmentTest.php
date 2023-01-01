<?php

use App\Models\Department;

beforeEach(function(){
    $this->user = createUser();
});

it('admin can create a department', function () {
    $department = ['name' => 'Test Department', 'description' => 'any description'];

    $this->actingAs($this->user)
    ->post(routeToUrl('admin.department.store'), $department)
    ->assertStatus(201);

    $this->assertDatabaseHas('departments', $department);

    $lastProduct = Department::latest()->first();
    expect($lastProduct->name)->toBe($department['name']);
    expect($lastProduct->description)->toBe($department['description']);
});

it('admin can update a department', function () {
    // $department = Department::factory()->create();
    $data = ['name' => 'Test Department', 'description' => 'any description'];
    $department = Department::create($data );

    $this->actingAs($this->user)
    ->put("/admin/department/".$department->id, [
        'name' => 'New Name',
        'description' => 'New Description',
    ])
    ->assertStatus(302);
    // ->put('admin.department.update', $department->id, [
    //     'name' => 'New Name',
    //     'description' => 'New Description',
    // ])
});



// $this->actingAs($this->admin)
// ->put("/products/".$product->id, [
//     'name' => '',
//     'price' => '',
// ])
// ->assertStatus(302)
// ->assertSessionHasErrors(['name', 'price'])
// ->assertInvalid(['name', 'price']);
