<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            // brand info
            $table->string('app_email')->nullable();
            $table->string('app_copyright')->nullable();
            $table->string('app_contact_number')->nullable();
            $table->string('app_location')->nullable();
            $table->string('app_dark_logo')->nullable();
            $table->string('app_light_logo')->nullable();
            $table->string('app_favicon')->nullable();

            // social links
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('pinterest')->nullable();

            // Google reCaptcha
            $table->string('recaptcha_site_key')->nullable();
            $table->boolean('recaptcha_active')->default(false);

            // Custom CSS & JS
            $table->longText('custom_css')->nullable();
            $table->longText('custom_header_script')->nullable();
            $table->longText('custom_footer_script')->nullable();

            // Cookies alert
            $table->boolean('cookies_alert_active')->default(true);
            $table->string('cookies_alert_message')->nullable();
            $table->string('cookies_alert_button_text')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
