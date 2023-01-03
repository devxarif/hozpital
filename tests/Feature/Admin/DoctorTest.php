<?php

use App\Models\User;
use App\Models\Doctor;
use App\Models\Department;

beforeEach(function(){
    $this->user = createUser();
});

test('doctor create validation redirect back to form', function(){
    actingAs($this->user)
    ->post(route('admin.doctor.store'), [
        'name' => '',
        'email' => '',
        'password' => '',
        'department' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name','email','password','department'])
    ->assertInvalid(['name','email','password','department']);
});

test('doctor create unique validation redirect back to form', function(){
    $user = User::factory()->create(['email' => 'doctor@mail.com']);
    $department = Department::factory()->create();
    Doctor::factory()->create(['user_id' => $user->id, 'department_id' => $department->id]);


   actingAs($this->user)
    ->post(route('admin.department.store'), [
        'email' => 'doctor@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can create a doctor', function () {
    $department = Department::factory()->create();
    $doctor  = ['name' => 'Doctor', 'email' => 'doctor@mail.com', 'password' => 'password','department' => $department->id];

   actingAs($this->user)
    ->post(route('admin.doctor.store'), $doctor)
    ->assertStatus(302);

    $this->assertDatabaseHas('users', ['name' => 'Doctor', 'email' => 'doctor@mail.com']);
    $this->assertDatabaseHas('doctors', ['department_id' => $department->id]);

    $lastDoctor = Doctor::latest()->first();
    expect($lastDoctor->user->name)->toBe($doctor['name']);
    expect($lastDoctor->user->email)->toBe($doctor['email']);
    expect($lastDoctor->department_id)->toBe($department->id);
});

test('doctor update validation redirect back to form', function(){
    Department::factory()->create();
    $doctor  = Doctor::factory()->create();

   actingAs($this->user)
    ->put(route('admin.doctor.update', $doctor->id),[
        'name' => '',
        'email' => '',
        'password' => '',
        'department' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name','email','password','department'])
    ->assertInvalid(['name','email','password','department']);
});

test('doctor update unique validation redirect back to form', function(){
    User::factory()->create(['email' => 'doctor@mail.com', 'role' => 'doctor']);
    Department::factory()->create();
    $doctor = Doctor::factory()->create();


   actingAs($this->user)
    ->put(route('admin.doctor.update', $doctor->id), [
        'name' => 'Doctor',
        'email' => 'doctor@mail.com',
        'department' => 1,
    ])
    ->assertStatus(302);
});

test('admin can update a doctor', function () {
    Department::factory()->create();
    $doctor  = Doctor::factory()->create();

   actingAs($this->user)
    ->put(route('admin.doctor.update', $doctor->id), [
        'name' => 'Doctor',
        'email' => 'doctor@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can delete a doctor', function () {
    Department::factory()->create();
    $doctor  = Doctor::factory()->create();

   actingAs($this->user)
    ->delete(route('admin.doctor.destroy', $doctor->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('doctors', $doctor->toArray());
    $this->assertDatabaseCount('doctors',0);
});
