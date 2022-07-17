<?php

namespace App\Policies;

use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChatRoomPolicy
{
    use HandlesAuthorization;

    public function message(?User $user, ChatRoom $chatRoom): bool
    {
        return $chatRoom
            ->users()
            ->where('users.id', $user->id)
            ->exists();
    }
}
