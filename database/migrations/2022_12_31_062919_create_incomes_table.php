<?php

use App\Models\Invoice;
use App\Models\IncomeCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->nullable();
            $table->foreignIdFor(Invoice::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('payment_method')->nullable();
            $table->foreignIdFor(IncomeCategory::class)->constrained()->cascadeOnDelete();
            $table->float('amount')->default(0);
            $table->string('title');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('incomes');
    }
};
