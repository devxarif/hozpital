<?php

use App\Models\DiagnosticReportType;
use App\Models\Laboratorist;
use App\Models\Prescription;
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
        Schema::create('diagnostic_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DiagnosticReportType::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Prescription::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Laboratorist::class)->constrained()->cascadeOnDelete();
            $table->string('attach_file')->nullable();
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
        Schema::dropIfExists('diagnostic_reports');
    }
};
