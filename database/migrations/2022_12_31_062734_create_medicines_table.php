<?php

use App\Models\Manufacture;
use App\Models\MedicineCategory;
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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MedicineCategory::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Manufacture::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->float('buying_price')->default(0);
            $table->float('selling_price')->default(0);
            $table->unsignedInteger('quantity')->default(0);
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->date('expire_date')->nullable();
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
        Schema::dropIfExists('medicines');
    }
};
