<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('game_lounges', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('game_id')
                ->constrained('games')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('name');
            $table->string('image');
            $table->string('theme_color')->nullable();
            $table->integer('type')->index();
            $table->integer('status')->index();

            $table->text('rules')->nullable();
            $table->integer('base_entrance_fee');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('game_lounges');
    }
};
