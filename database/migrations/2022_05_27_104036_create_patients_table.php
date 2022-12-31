<?php

use App\Models\User;
use App\Models\Department;
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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Department::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('avatar')->nullable();
            $table->string('address')->nullable();
            $table->string('phone',15)->nullable();
            $table->enum('gender', ['male','female'])->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('age')->nullable();
            $table->string('blood_group', 3)->nullable();
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
        Schema::dropIfExists('patients');
    }
};
