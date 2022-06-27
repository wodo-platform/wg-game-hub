<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::rename('game_lounge_templates', 'game_lobby_templates');
        Schema::rename('game_lounge_user', 'game_lobby_user');
        Schema::rename('game_lounges', 'game_lobbies');
        Schema::rename('game_lounge_chat_messages', 'game_lobby_chat_messages');
        Schema::table('game_lobby_chat_messages', function (Blueprint $table) {
            $table->renameColumn('game_lounge_id', 'game_lobby_id');
        });
        Schema::table('game_lobby_user', function (Blueprint $table) {
            $table->renameColumn('game_lounge_id', 'game_lobby_id');
        });
    }

    public function down()
    {
        Schema::rename('game_lobby_templates', 'game_lounge_templates');
        Schema::rename('game_lobby_user', 'game_lounge_user');
        Schema::rename('game_lobbies', 'game_lounges');
        Schema::rename('game_lobby_chat_messages', 'game_lounge_chat_messages');
        Schema::table('game_lobby_chat_messages', function (Blueprint $table) {
            $table->renameColumn('game_lobby_id', 'game_lounge_id');
        });
        Schema::table('game_lobby_user', function (Blueprint $table) {
            $table->renameColumn('game_lobby_id', 'game_lounge_id');
        });
    }
};
