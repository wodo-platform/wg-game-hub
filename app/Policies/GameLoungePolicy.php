<?php

namespace App\Policies;

use App\Models\GameLounge;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GameLoungePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, GameLounge $gameLounge): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, GameLounge $gameLounge): bool
    {
        //
    }

    public function delete(User $user, GameLounge $gameLounge): bool
    {
        //
    }

    public function restore(User $user, GameLounge $gameLounge): bool
    {
        //
    }

    public function forceDelete(User $user, GameLounge $gameLounge): bool
    {
        //
    }
}
