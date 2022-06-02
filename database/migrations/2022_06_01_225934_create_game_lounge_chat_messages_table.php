<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('game_lounge_chat_messages', function (
            Blueprint $table,
        ) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('game_lounge_id')->constrained('game_lounges');
            $table->text('message');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('game_lounge_chat_messages');
    }
};
