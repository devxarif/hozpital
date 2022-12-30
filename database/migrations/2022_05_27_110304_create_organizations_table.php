<?php

use App\Models\User;
use App\Models\Country;
use App\Models\Industry;
use App\Models\TeamSize;
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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Country::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(TeamSize::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Industry::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('organization_name')->nullable();
            $table->string('organization_email')->nullable();
            $table->string('organization_phone')->nullable();
            $table->string('organization_logo')->nullable();
            $table->string('organization_website')->nullable();
            $table->string('organization_timezone')->nullable();
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
        Schema::dropIfExists('organizations');
    }
};
