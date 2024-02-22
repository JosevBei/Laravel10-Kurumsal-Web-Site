<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Bildirim türü (örneğin: contact_message, offer)
            $table->unsignedBigInteger('type_id'); // Bildirimle ilişkilendirilmiş kaydın ID'si
            $table->string('message'); // Bildirim mesajı
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
