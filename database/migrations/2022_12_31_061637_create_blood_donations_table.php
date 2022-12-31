<?php

use App\Models\BloodDonor;
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
        Schema::create('blood_donations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BloodDonor::class)->constrained()->cascadeOnDelete();
            $table->string('bags');
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
        Schema::dropIfExists('blood_donations');
    }
};
