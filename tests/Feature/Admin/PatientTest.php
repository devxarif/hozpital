<?php

use App\Models\Patient;
use App\Models\User;

beforeEach(function () {
    $this->user = createUser();
});

test('patient create validation redirect back to form', function () {
    actingAs($this->user)
    ->post(route('admin.patient.store'), [
        'name' => '',
        'email' => '',
        'password' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name', 'email', 'password'])
    ->assertInvalid(['name', 'email', 'password']);
});

test('patient create unique validation redirect back to form', function () {
    $user = User::factory()->create(['email' => 'patient@mail.com']);
    Patient::factory()->create(['user_id' => $user->id]);

   actingAs($this->user)
    ->post(route('admin.patient.store'), [
        'email' => 'patient@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can create a patient', function () {
    $patient = ['name' => 'Patient', 'email' => 'patient@mail.com', 'password' => 'password'];

   actingAs($this->user)
    ->post(route('admin.patient.store'), $patient)
    ->assertStatus(302);

    $this->assertDatabaseHas('users', ['name' => 'Patient', 'email' => 'patient@mail.com']);

    $lastpatient = Patient::latest()->first();
    expect($lastpatient->user->name)->toBe($patient['name']);
    expect($lastpatient->user->email)->toBe($patient['email']);
});

test('patient update validation redirect back to form', function () {
    $patient = Patient::factory()->create();

   actingAs($this->user)
    ->put(route('admin.patient.update', $patient->id), [
        'name' => '',
        'email' => '',
        'password' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name', 'email'])
    ->assertInvalid(['name', 'email']);
});

test('patient update unique validation redirect back to form', function () {
    User::factory()->create(['email' => 'patient@mail.com', 'role' => 'patient']);
    $patient = Patient::factory()->create();

    actingAs($this->user)
    ->put(route('admin.patient.update', $patient->id), [
        'name' => 'Patient',
        'email' => 'patient@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can update a patient', function () {
    $patient = Patient::factory()->create();

   actingAs($this->user)
    ->put(route('admin.patient.update', $patient->id), [
        'name' => 'Patient',
        'email' => 'patient@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can delete a patient', function () {
    $patient = Patient::factory()->create();

   actingAs($this->user)
    ->delete(route('admin.patient.destroy', $patient->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('patients', $patient->toArray());
    $this->assertDatabaseCount('patients', 0);
});
