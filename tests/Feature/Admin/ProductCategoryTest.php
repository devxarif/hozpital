<?php

use App\Models\Department;
use App\Models\Manufacture;
use App\Models\ProductCategory;

beforeEach(function(){
    $this->user = createUser();
});

test('product categoty create validation redirect back to form', function(){
    actingAs($this->user)
    ->post(route('admin.productCategory.store'), [
        'name' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name'])
    ->assertInvalid(['name']);
});

test('product category create unique validation redirect back to form', function(){
    ProductCategory::factory()->create(['name' => 'Fever']);

   actingAs($this->user)
    ->post(route('admin.productCategory.store'), [
        'name' => 'Fever',
    ])
    ->assertStatus(302);
});

test('admin can create a product category', function () {
    $product_categoty = ['name' => 'Acme', 'description' => 'any description'];

    actingAs($this->user)
    ->post(route('admin.productCategory.store'), $product_categoty)
    ->assertStatus(302);

    $this->assertDatabaseHas('product_categories', $product_categoty);

    $lastItem = ProductCategory::latest()->first();
    expect($lastItem->name)->toBe($product_categoty['name']);
});

test('product categoty update validation redirect back to form', function(){
    $product_categoty = ProductCategory::factory()->create();

    actingAs($this->user)
    ->put(route('admin.productCategory.update', $product_categoty->id), [
        'name' => '',
        'description' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name'])
    ->assertInvalid(['name']);
});

test('product cateogry update unique validation redirect back to form', function(){
    ProductCategory::factory()->create(['name' => 'Fever']);
    $product_categoty  = ProductCategory::factory()->create();

   actingAs($this->user)
    ->put(route('admin.productCategory.update', $product_categoty->id),[
        'name' => 'Fever',
        'description' => 'any description',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['name'])
    ->assertInvalid(['name']);
});

test('admin can update a manufacture', function () {
    $product_categoty = ProductCategory::create([
        'name' => 'Fever',
        'description' => 'any descripiton',
    ]);

    actingAs($this->user)
    ->put(route('admin.productCategory.update', $product_categoty->id), [
        'name' => 'Popular',
    ])
    ->assertStatus(302);
});

test('admin can delete a manufacture', function () {
    $product_categoty = ProductCategory::factory()->create();

    actingAs($this->user)
    ->delete(route('admin.productCategory.destroy', $product_categoty->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('product_categories', $product_categoty->toArray());
    $this->assertDatabaseCount('product_categories',0);
});
