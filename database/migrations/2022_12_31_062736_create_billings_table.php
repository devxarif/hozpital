<?php

use App\Models\Patient;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->foreignIdFor(Patient::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->date('date');
            $table->enum('status', ['paid', 'pending']);
            $table->integer('discount_percentage')->nullable();
            $table->float('sub_total')->nullable();
            $table->float('total_amount')->nullable();
            $table->float('discount_amount')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
