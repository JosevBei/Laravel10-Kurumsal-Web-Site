<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutContentsTable extends Migration
{
    public function up()
    {
        Schema::create('about_contents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Bu sütun isimlerin benzersiz olmasını sağlar
            $table->text('content');
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_contents');
    }
}