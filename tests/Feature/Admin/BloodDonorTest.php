<?php

// $table->string('name');
// $table->string('blood_group', 10);
// $table->enum('gender', ['male','female'])->default('male');
// $table->string('phone');
// $table->string('email');
// $table->text('address')->nullable();
// $table->integer('age')->nullable();

use App\Models\BloodDonor;

beforeEach(function () {
    $this->user = createUser();
});

test('blood donor create validation redirect back to form', function () {
    actingAs($this->user)
    ->post(route('admin.bloodDonor.store'), [
        'name' => '',
        'blood_group' => '',
        'gender' => '',
        'phone' => '',
        'email' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name', 'blood_group', 'gender', 'phone', 'email'])
    ->assertInvalid(['name', 'blood_group', 'gender', 'phone', 'email']);
});

test('blood donor create unique validation redirect back to form', function () {
    BloodDonor::factory()->create(['email' => 'donor@mail.com']);

    actingAs($this->user)
    ->post(route('admin.bloodDonor.store'), [
        'email' => 'donor@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can create a blood donor', function () {
    $blood_donor = ['name' => 'Mr John', 'blood_group' => 'A+', 'gender' => 'male', 'phone' => '123456789', 'email' => 'donor@mail.com'];

    actingAs($this->user)
    ->post(route('admin.bloodDonor.store'), $blood_donor)
    ->assertStatus(302);

    $this->assertDatabaseHas('blood_donors', $blood_donor);

    $lastProduct = BloodDonor::latest()->first();
    expect($lastProduct->name)->toBe($blood_donor['name']);
    expect($lastProduct->blood_group)->toBe($blood_donor['blood_group']);
    expect($lastProduct->gender)->toBe($blood_donor['gender']);
    expect($lastProduct->phone)->toBe($blood_donor['phone']);
    expect($lastProduct->email)->toBe($blood_donor['email']);
});

test('blood donor update validation redirect back to form', function () {
    $blood_donor = BloodDonor::factory()->create();

    actingAs($this->user)
    ->put(route('admin.bloodDonor.update', $blood_donor->id), [
        'name' => '',
        'blood_group' => '',
        'gender' => '',
        'phone' => '',
        'email' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name', 'blood_group', 'gender', 'phone', 'email'])
    ->assertInvalid(['name', 'blood_group', 'gender', 'phone', 'email']);
});

test('blood donor update unique validation redirect back to form', function () {
    $blood_donor = BloodDonor::factory()->create(['email' => 'donor@mail.com']);

    actingAs($this->user)
    ->put(route('admin.bloodDonor.update', $blood_donor->id), [
        'email' => 'donor@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can update a blood donor', function () {
    $data = ['name' => 'Mr John', 'blood_group' => 'A+', 'gender' => 'male', 'phone' => '123456789', 'email' => 'donor@mail.com'];
    $blood_donor = BloodDonor::create($data);

    actingAs($this->user)
    ->put(route('admin.bloodDonor.update', $blood_donor->id), [
        'name' => 'Mr John Doe',
        'blood_group' => 'B+',
        'gender' => 'female',
        'phone' => '1234567',
        'email' => 'donor2@mail.com',
    ])
    ->assertStatus(302);
});

test('admin can delete a blood donor', function () {
    $blood_donor = BloodDonor::factory()->create();

    actingAs($this->user)
    ->delete(route('admin.bloodDonor.destroy', $blood_donor->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('blood_donors', $blood_donor->toArray());
    $this->assertDatabaseCount('blood_donors', 0);
});
