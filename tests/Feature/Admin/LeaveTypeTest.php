<?php

use App\Models\LeaveType;


beforeEach(function(){
    $this->user = createUser();
});

test('leave type create validation redirect back to form', function(){
    actingAs($this->user)
    ->post(route('admin.leaveType.store'), [
        'name' => '',
        'color' => '',
        'balance' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name','color','balance'])
    ->assertInvalid(['name','color','balance']);
});

test('leave type create unique validation redirect back to form', function(){
    LeaveType::create(['name' => 'Casual Leave', 'balance' => 5]);

    actingAs($this->user)
    ->post(route('admin.leaveType.store'), [
        'name' => 'Casual Leave',
    ])
    ->assertStatus(302);
});

test('admin can create a leave type', function () {
    $leave_type = ['name' => 'Casual Leave', 'balance' => 10,'color' => '#ffffff'];

    actingAs($this->user)
    ->post(route('admin.leaveType.store'), $leave_type)
    ->assertStatus(302);

    $this->assertDatabaseHas('leave_types', $leave_type);

    $lastProduct = LeaveType::latest()->first();
    expect($lastProduct->name)->toBe($leave_type['name']);
    expect($lastProduct->balance)->toBe($leave_type['balance']);
    expect($lastProduct->color)->toBe($leave_type['color']);
});

test('leave type update validation redirect back to form', function(){
    $leave_type = LeaveType::create(['name' => 'Casual Leave', 'balance' => 5]);

    actingAs($this->user)
    ->put(route('admin.leaveType.update', $leave_type->id), [
        'name' => '',
        'color' => '',
        'balance' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name','color','balance'])
    ->assertInvalid(['name','color','balance']);
});

test('leave type update unique validation redirect back to form', function(){
    $leave_type = LeaveType::create(['name' => 'Casual Leave', 'balance' => 5]);
    LeaveType::create(['name' => 'Paid Leave', 'balance' => 5]);

    actingAs($this->user)
    ->put(route('admin.leaveType.update', $leave_type->id), [
        'name' => 'Paid Leave',
    ])
    ->assertStatus(302);
});

test('admin can update a leave type', function () {
    $leave_type = LeaveType::create([
        'name' => 'Casual Leave',
        'balance' => 10,
        'color' => '#ffffff'
    ]);

    actingAs($this->user)
    ->put(route('admin.leaveType.update', $leave_type->id), [
        'name' => 'Paid Leave',
        'balance' => 10,
        'color' => '#ffffff'
    ])
    ->assertStatus(302);
});

test('admin can delete a leave type', function () {
    $leave_type = LeaveType::create([
        'name' => 'Casual Leave',
        'balance' => 10,
        'color' => '#ffffff'
    ]);

    actingAs($this->user)
    ->delete(route('admin.leaveType.destroy', $leave_type->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('leave_types', $leave_type->toArray());
    $this->assertDatabaseCount('leave_types',0);
});

