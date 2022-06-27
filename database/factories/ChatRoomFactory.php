<?php

namespace Database\Factories;

use App\Enums\ChatRoomType;
use App\Models\ChatRoom;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChatRoomFactory extends Factory
{
    protected $model = ChatRoom::class;

    public function definition(): array
    {
        return [
            'type' => ChatRoomType::GameLobby,
        ];
    }
}
