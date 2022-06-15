<?php

use App\Models\{ChatRoom, User};
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('chat_room_user', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('chat_room_id')->constrained('chat_rooms');
            $table->foreignUuid('user_id')->constrained('users');
            $table->timestamps();

            $table->unique(['chat_room_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat_room_user');
    }
};
