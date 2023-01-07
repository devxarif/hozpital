<?php

use App\Models\Manufacture;
use App\Models\Medicine;
use App\Models\MedicineCategory;

beforeEach(function(){
    $this->user = createUser();
});

test('medicine create validation redirect back to form', function(){
    actingAs($this->user)
    ->post(route('admin.medicine.store'), [
        'medicine_category' => '',
        'manufacture' => '',
        'name' => '',
        'selling_price' => '',
        'quantity' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['medicine_category','manufacture','name','selling_price','quantity'])
    ->assertInvalid(['medicine_category','manufacture','name','selling_price','quantity']);
});

test('medicine create unique validation redirect back to form', function(){
    Manufacture::factory()->create();
    MedicineCategory::factory()->create();
    Medicine::factory()->create(['name' => 'Maxpro']);

   actingAs($this->user)
    ->post(route('admin.medicine.store'), [
        'medicine_category' => 1,
        'manufacture' => 1,
        'name' => 'Maxpro',
        'selling_price' => '20',
        'quantity' => '1',
    ])
    ->assertStatus(302);
});

test('admin can create a medicine', function () {
    $medicine_categoty = MedicineCategory::factory()->create();
    $Manufacture = Manufacture::factory()->create();
    $medicine = [
        'medicine_category' => $medicine_categoty->id,
        'manufacture' => $Manufacture ->id,
        'name' => 'Maxpro',
        'selling_price' => 20.00,
        'quantity' => 1,
    ];

    actingAs($this->user)
    ->post(route('admin.medicine.store'), $medicine)
    ->assertStatus(302);

    $this->assertDatabaseHas('medicines',  [
        'medicine_category_id' => $medicine_categoty->id,
        'manufacture_id' => $Manufacture ->id,
        'name' => 'Maxpro',
        'selling_price' => 20.00,
        'quantity' => 1,
    ]);

    $lastItem = Medicine::latest()->first();
    expect($lastItem->medicine_category_id)->toBe($medicine['medicine_category']);
    expect($lastItem->manufacture_id)->toBe($medicine['manufacture']);
    expect($lastItem->name)->toBe($medicine['name']);
    expect($lastItem->selling_price)->toBe($medicine['selling_price']);
    expect($lastItem->quantity)->toBe($medicine['quantity']);
});

test('medicine update validation redirect back to form', function(){
    MedicineCategory::factory()->create();
    Manufacture::factory()->create();
    $medicine = Medicine::factory()->create();

    actingAs($this->user)
    ->put(route('admin.medicine.update', $medicine->id), [
        'medicine_category' => '',
        'manufacture' => '',
        'name' => '',
        'selling_price' => '',
        'quantity' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['medicine_category','manufacture','name','selling_price','quantity'])
    ->assertInvalid(['medicine_category','manufacture','name','selling_price','quantity']);
});

test('medicine update unique validation redirect back to form', function(){
    MedicineCategory::factory()->create();
    Manufacture::factory()->create();
    Medicine::factory()->create(['name' => 'Maxpro']);
    $medicine  = Medicine::factory()->create();

   actingAs($this->user)
    ->put(route('admin.medicine.update', $medicine->id),[
        'medicine_category' => 1,
        'manufacture' => 1,
        'name' => 'Maxpro',
        'selling_price' => '20',
        'quantity' => '1',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name'])
    ->assertInvalid(['name']);
});

test('admin can update a manufacture', function () {
    $medicine_categoty = MedicineCategory::factory()->create();
    $Manufacture = Manufacture::factory()->create();
    $medicine = Medicine::factory()->create();
    // $medicine = Medicine::create([
    //     'medicine_category' => $medicine_categoty->id,
    //     'manufacture' => $Manufacture->id,
    //     'name' => 'Maxpro',
    //     'selling_price' => '20',
    //     'quantity' => '1',
    // ]);

    actingAs($this->user)
    ->put(route('admin.medicine.update', $medicine->id), [
        'medicine_category' => $medicine_categoty->id,
        'manufacture' => $Manufacture->id,
        'name' => 'Maxpro Plus',
        'selling_price' => 20,
        'quantity' => 5,
    ])
    ->assertStatus(302);
});

test('admin can delete a medicine', function () {
    MedicineCategory::factory()->create();
    Manufacture::factory()->create();
    $medicine = Medicine::factory()->create();

    actingAs($this->user)
    ->delete(route('admin.medicine.destroy', $medicine->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('medicines', $medicine->toArray());
    $this->assertDatabaseCount('medicines',0);
});
