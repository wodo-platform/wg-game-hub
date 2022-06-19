<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('game_lounges', function (Blueprint $table) {
            $table->text('description')->after('name');
            $table->unsignedInteger('max_players')->after('base_entrance_fee');
            $table->unsignedInteger('min_players')->after('base_entrance_fee');
            $table
                ->foreignUuid('asset_id')
                ->after('rules')
                ->constrained('assets');
            $table->integer('available_spots')->after('max_players');
        });
    }

    public function down()
    {
        Schema::table('game_lounges', function (Blueprint $table) {});
    }
};
