<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('game_lounge_user', function (Blueprint $table) {
            $table
                ->dateTime('left_at')
                ->nullable()
                ->change();
        });
    }
};
