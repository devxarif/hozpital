<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->id();

            // Home page
            $table->string('home_banner_title')->nullable();
            $table->string('home_banner_subtitle')->nullable();
            $table->text('home_banner_description')->nullable();
            $table->string('home_banner_button_text')->nullable();
            $table->string('home_banner_button2_text')->nullable();
            $table->string('home_banner_button_url')->nullable();
            $table->string('home_banner_button2_url')->nullable();
            $table->string('home_banner_bg_image')->nullable();
            $table->boolean('home_banner_status')->default(1);

            $table->string('home_about_title')->nullable();
            $table->text('home_about_description')->nullable();
            $table->string('home_about_button_text')->nullable();
            $table->string('home_about_button_url')->nullable();
            $table->string('home_about_image')->nullable();
            $table->string('home_about_image2')->nullable();
            $table->string('home_about_image3')->nullable();
            $table->boolean('home_about_status')->default(1);

            $table->string('home_counter_bg_image')->nullable();
            $table->string('home_counter_name')->nullable();
            $table->string('home_counter_shortname')->nullable();
            $table->string('home_counter_count')->nullable();
            $table->string('home_counter2_name')->nullable();
            $table->string('home_counter2_shortname')->nullable();
            $table->string('home_counter2_count')->nullable();
            $table->string('home_counter3_name')->nullable();
            $table->string('home_counter3_shortname')->nullable();
            $table->string('home_counter3_count')->nullable();
            $table->string('home_counter4_name')->nullable();
            $table->string('home_counter4_shortname')->nullable();
            $table->string('home_counter4_count')->nullable();
            $table->boolean('home_counter_status')->default(1);

            $table->string('home_service_title')->nullable();
            $table->text('home_service_description')->nullable();
            $table->boolean('home_service_status')->default(1);

            $table->string('home_appointment_title')->nullable();
            $table->text('home_appointment_description')->nullable();
            $table->string('home_appointment_image')->nullable();
            $table->string('home_appointment_contact')->nullable();
            $table->boolean('home_appointment_status')->default(1);

            $table->string('home_testimonial_title')->nullable();
            $table->text('home_testimonial_description')->nullable();
            $table->boolean('home_testimonial_status')->default(1);

            $table->string('home_partner_title')->nullable();
            $table->text('home_partner_description')->nullable();
            $table->boolean('home_partner_status')->default(1);

            // About page
            $table->string('about_title')->nullable();
            $table->text('about_description')->nullable();
            $table->string('about_image')->nullable();
            $table->string('about_image2')->nullable();
            $table->string('about_image3')->nullable();
            $table->string('about_status')->default(1);

            $table->string('about_service_title')->nullable();
            $table->text('about_service_description')->nullable();
            $table->string('about_service_status')->default(1);

            $table->string('about_partner_title')->nullable();
            $table->string('about_partner_status')->default(1);
            $table->string('about_meet_specialist_title')->nullable();
            $table->text('about_meet_specialist_description')->nullable();
            $table->string('about_meet_specialist_status')->default(1);
            $table->string('about_testimonial_title')->nullable();
            $table->string('about_testimonial_image')->nullable();
            $table->string('about_testimonial_status')->default(1);

            // Service page
            $table->string('service_title')->nullable();
            $table->text('service_description')->nullable();

            // Department page
            $table->string('department_title')->nullable();
            $table->text('department_description')->nullable();

            // Appointment page
            $table->string('appointment_title')->nullable();
            $table->text('appointment_description')->nullable();

            // Contact page
            $table->string('contact_title')->nullable();
            $table->text('contact_description')->nullable();
            $table->mediumText('contact_map_location')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_address')->nullable();

            // Terms & Privacy page
            $table->longText('terms_description')->nullable();
            $table->longText('privacy_description')->nullable();

            // Others
            $table->string('emergency_number')->nullable();


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
        Schema::dropIfExists('cms');
    }
}
