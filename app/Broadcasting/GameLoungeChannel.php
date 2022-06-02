<?php

namespace App\Broadcasting;

use App\Models\GameLounge;
use App\Models\User;

class GameLoungeChannel
{
    public function __construct()
    {
        //
    }

    public function join(User $user, GameLounge $gameLounge): bool|array
    {
        $user = $gameLounge
            ->users()
            ->where('user_id', $user->id)
            ->first();

        if (!$user) {
            return false;
        }

        return [
            'id' => $user->id,
            'name' => $user->name,
            'last_name' => $user->last_name,
            'first_name' => $user->first_name,
            'username' => $user->username,
            'image' => $user->image,
        ];
    }
}
