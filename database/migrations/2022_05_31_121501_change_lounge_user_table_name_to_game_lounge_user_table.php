<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::rename('lounge_user', 'game_lounge_user');
    }

    public function down()
    {
        Schema::rename('game_lounge_user', 'lounge_user');
    }
};
