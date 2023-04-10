<?php

namespace Database\Factories;

use App\Models\Organization;
use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id' => uniqid(),
            'transaction_id' => uniqid('tr_'),
            'payment_provider' => fake()->randomElement(['flutterwave', 'mollie', 'midtrans', 'paypal', 'paystack', 'razorpay', 'stripe', 'instamojo']),
            'amount' => rand(100, 1000),
            'currency_symbol' => fake()->randomElement(['$', '₦', '₹', '€', '£']),
            'usd_amount' => rand(100, 1000),
            'payment_status' => fake()->randomElement(['paid', 'unpaid']),
            'order_status' => fake()->randomElement(['pending', 'confirmed','on_the_way', 'delivered', 'cancelled', 'refunded']),
        ];
    }
}
