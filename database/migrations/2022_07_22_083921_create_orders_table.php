<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->string('order_id');
            $table->string('transaction_id')->nullable();
            $table->enum('payment_provider', ['flutterwave', 'mollie', 'midtrans', 'paypal', 'paystack', 'razorpay', 'sslcommerz', 'stripe', 'instamojo', 'offline', 'none']);
            $table->string('amount')->default('0');
            $table->string('currency')->default('USD');
            $table->string('usd_amount')->default('0');
            $table->enum('payment_status', ['paid', 'unpaid'])->default('unpaid');
            $table->enum('order_status', ['pending', 'confirmed','on_the_way', 'delivered', 'cancelled', 'refunded'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
