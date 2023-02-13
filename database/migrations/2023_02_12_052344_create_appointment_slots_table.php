<?php

use App\Models\AppointmentSchedule;
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
        Schema::create('appointment_slots', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AppointmentSchedule::class)->constrained()->cascadeOnDelete();
            $table->string('start_time')->default('09:00');
            $table->string('end_time')->default('17:00');
            $table->string('diff_time')->default(30);
            $table->string('slot')->default("09:00 - 17:00");
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
        Schema::dropIfExists('appointment_slots');
    }
};
