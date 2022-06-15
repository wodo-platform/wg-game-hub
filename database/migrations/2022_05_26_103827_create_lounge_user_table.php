<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('lounge_user', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignUuid('user_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table
                ->foreignUuid('game_lounge_id')
                ->constrained('game_lounges')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->integer('entrance_fee');
            $table->dateTime('joined_at');
            $table->dateTime('left_at');

            $table->unique(['user_id', 'game_lounge_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('lounge_user');
    }
};
