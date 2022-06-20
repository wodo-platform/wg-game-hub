<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('game_lounge_templates', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('game_id')->constrained('games');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('theme_color')->nullable();
            $table->text('description');
            $table->text('rules');
            $table->foreignUuid('asset_id')->constrained('assets');
            $table->float('base_entrance_fee');
            $table->integer('min_players');
            $table->integer('max_players');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('game_lounge_templates');
    }
};
