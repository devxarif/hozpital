<?php

use App\Models\BedFloor;
use App\Models\BedType;
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
        Schema::create('beds', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BedType::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(BedFloor::class)->constrained()->cascadeOnDelete();
            $table->string('number');
            $table->float('charge')->nullable()->default(0);
            $table->enum('status', ['alloted', 'free'])->default('free');
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
        Schema::dropIfExists('beds');
    }
};
