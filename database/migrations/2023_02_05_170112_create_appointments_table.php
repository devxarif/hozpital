<?php

use App\Models\Doctor;
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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Doctor::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Patient::class)->constrained()->cascadeOnDelete();
            $table->string('problem');
            $table->string('serial_no');
            $table->date('date');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('slot');
            $table->enum('status', ['approved', 'pending','cancelled','completed']);
            $table->enum('type', ['online', 'offline'])->default('offline');
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
        Schema::dropIfExists('appointments');
    }
};
