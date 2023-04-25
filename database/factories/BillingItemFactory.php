<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BillingItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $qty = rand(1, 10);
        $price = rand(200, 400);
        $amount = $qty * $price;

        return [
            'qty' => $qty,
            'price' => $price,
            'amount' => $amount,
        ];
    }
}
