<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title');
            $table->text('site_description')->nullable();
            $table->string('theme_color')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('email_address')->nullable();
            $table->text('address')->nullable();
            $table->boolean('maintenance_mode')->default(false);
            // Diğer alanları ekleyebilirsin
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}