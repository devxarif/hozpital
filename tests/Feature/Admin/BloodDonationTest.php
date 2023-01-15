<?php

use App\Models\BloodDonation;
use App\Models\BloodDonor;

beforeEach(function(){
    $this->user = createUser();
});

test('blood donation create validation redirect back to form', function(){
    actingAs($this->user)
    ->post(route('admin.bloodDonation.store'), [
        'blood_donor_id' => '',
        'bags' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['blood_donor','bags'])
    ->assertInvalid(['blood_donor','bags']);
});


test('admin can create a blood donation', function () {
    $blood_donation = ['blood_donor' => BloodDonor::factory()->create()->id,'bags' => '2'];

    actingAs($this->user)
    ->post(route('admin.bloodDonation.store'), $blood_donation)
    ->assertStatus(302);

    $this->assertDatabaseHas('blood_donations', [
        'blood_donor_id' => $blood_donation['blood_donor'],
        'bags' => $blood_donation['bags'],
    ]);

    $lastProduct = BloodDonation::latest()->first();
    expect($lastProduct->blood_donor_id)->toBe($blood_donation['blood_donor']);
    expect($lastProduct->bags)->toBe($blood_donation['bags']);
});

test('blood donation update validation redirect back to form', function(){
    BloodDonor::factory()->create();
    $blood_donation = BloodDonation::factory()->create();

    actingAs($this->user)
    ->put(route('admin.bloodDonation.update', $blood_donation->id), [
        'blood_donor_id' => '',
        'bags' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['blood_donor','bags'])
    ->assertInvalid(['blood_donor','bags']);
});


test('admin can update a blood donation', function () {
    $data = ['blood_donor_id' => BloodDonor::factory()->create()->id,'bags' => 2];
    $blood_donation = BloodDonation::create($data );

    actingAs($this->user)
    ->put(route('admin.bloodDonation.update', $blood_donation->id), [
        'blood_donor_id' => BloodDonor::factory()->create()->id,
        'bags' => '5',
    ])
    ->assertStatus(302);
});

test('admin can delete a blood donation', function () {
    BloodDonor::factory()->create();
    $blood_donation = BloodDonation::factory()->create();

    actingAs($this->user)
    ->delete(route('admin.bloodDonation.destroy', $blood_donation->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('blood_donations', $blood_donation->toArray());
    $this->assertDatabaseCount('blood_donations',0);
});

