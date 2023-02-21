<?php

use App\Models\Manufacture;
use App\Models\Product;
use App\Models\ProductCategory;

beforeEach(function () {
    $this->user = createUser();
});

test('product create validation redirect back to form', function () {
    actingAs($this->user)
    ->post(route('admin.product.store'), [
        'product_category' => '',
        'manufacture' => '',
        'name' => '',
        'selling_price' => '',
        'quantity' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['product_category', 'manufacture', 'name', 'selling_price', 'quantity'])
    ->assertInvalid(['product_category', 'manufacture', 'name', 'selling_price', 'quantity']);
});

test('product create unique validation redirect back to form', function () {
    Manufacture::factory()->create();
    ProductCategory::factory()->create();
    Product::factory()->create(['name' => 'Maxpro']);

   actingAs($this->user)
    ->post(route('admin.product.store'), [
        'product_category' => 1,
        'manufacture' => 1,
        'name' => 'Maxpro',
        'selling_price' => '20',
        'quantity' => '1',
    ])
    ->assertStatus(302);
});

test('admin can create a product', function () {
    $product_categoty = ProductCategory::factory()->create();
    $Manufacture = Manufacture::factory()->create();
    $product = [
        'product_category' => $product_categoty->id,
        'manufacture' => $Manufacture->id,
        'name' => 'Maxpro',
        'selling_price' => 20.00,
        'quantity' => 1,
    ];

    actingAs($this->user)
    ->post(route('admin.product.store'), $product)
    ->assertStatus(302);

    $this->assertDatabaseHas('products', [
        'product_category_id' => $product_categoty->id,
        'manufacture_id' => $Manufacture->id,
        'name' => 'Maxpro',
        'selling_price' => 20.00,
        'quantity' => 1,
    ]);

    $lastItem = Product::latest()->first();
    expect($lastItem->product_category_id)->toBe($product['product_category']);
    expect($lastItem->manufacture_id)->toBe($product['manufacture']);
    expect($lastItem->name)->toBe($product['name']);
    expect($lastItem->selling_price)->toBe($product['selling_price']);
    expect($lastItem->quantity)->toBe($product['quantity']);
});

test('product update validation redirect back to form', function () {
    ProductCategory::factory()->create();
    Manufacture::factory()->create();
    $product = Product::factory()->create();

    actingAs($this->user)
    ->put(route('admin.product.update', $product->id), [
        'product_category' => '',
        'manufacture' => '',
        'name' => '',
        'selling_price' => '',
        'quantity' => '',
    ])
    ->assertStatus(302)
    ->assertSessionHasErrors(['product_category', 'manufacture', 'name', 'selling_price', 'quantity'])
    ->assertInvalid(['product_category', 'manufacture', 'name', 'selling_price', 'quantity']);
});

test('product update unique validation redirect back to form', function () {
    ProductCategory::factory()->create();
    Manufacture::factory()->create();
    Product::factory()->create(['name' => 'Maxpro']);
    $product = product::factory()->create();

   actingAs($this->user)
    ->put(route('admin.product.update', $product->id), [
        'product_category' => 1,
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
    $product_categoty = ProductCategory::factory()->create();
    $Manufacture = Manufacture::factory()->create();
    $product = Product::factory()->create();

    actingAs($this->user)
    ->put(route('admin.product.update', $product->id), [
        'product_category' => $product_categoty->id,
        'manufacture' => $Manufacture->id,
        'name' => 'Maxpro Plus',
        'selling_price' => 20,
        'quantity' => 5,
    ])
    ->assertStatus(302);
});

test('admin can delete a product', function () {
    ProductCategory::factory()->create();
    Manufacture::factory()->create();
    $product = Product::factory()->create();

    actingAs($this->user)
    ->delete(route('admin.product.destroy', $product->id))
    ->assertStatus(302);

    $this->assertDatabaseMissing('products', $product->toArray());
    $this->assertDatabaseCount('products', 0);
});
