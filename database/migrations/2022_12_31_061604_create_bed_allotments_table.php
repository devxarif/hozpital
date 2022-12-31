<?php

use App\Models\Bed;
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
        Schema::create('bed_allotments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Bed::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Patient::class)->constrained()->cascadeOnDelete();
            $table->date('allotment_date');
            $table->date('discharge_date');
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
        Schema::dropIfExists('bed_allotments');
    }
};
